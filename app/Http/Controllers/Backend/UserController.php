<?php

namespace App\Http\Controllers\Backend;

use Auth;
use Illuminate\Http\Request;
use App\Facades\RoleRepository;
use App\Facades\UserRepository;
use App\Facades\UserProfileRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\UserCreateForm;
use App\Http\Requests\Form\UserUpdateForm;
use App\Services\UploadService;
use App\Models\File;

/**
 * 用户管理控制器
 *
 * @package App\Http\Controllers\Backend
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserRepository::paginate(config('repository.page-limit'));

        return view("backend.user.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = RoleRepository::all();

        return view("backend.user.create", compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Form\UserCreateForm $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateForm $request)
    {
        $data = [
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => bcrypt($request['password']),
        ];

        try {
            $roles = RoleRepository::getByWhereIn('id', $request['role_id']);

            if(empty($roles->toArray())){
                return $this->errorBackTo("用户角色不存在,请刷新页面并选择其他用户角色");
            }

            $user = UserRepository::create($data);
            if($user){

                foreach ($roles as $role) {
                    $user->attachRole($role);
                }

                return $this->successRoutTo('backend.user.index', '新增用户成功');
            }

        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = UserRepository::find($id);
        $roles = RoleRepository::all();
        $userRoles = $user->roles->toArray();
        $displayNames = array_map(function ($value) {
            return $value['display_name'];
        }, $userRoles);

        return view('backend.user.edit', compact('user', 'roles', 'userRoles', 'displayNames'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Form\UserUpdateForm $request
     * @param  int                                    $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateForm $request, $id)
    {
        if($id != Auth::user()->id && Auth::user()->is_super_admin == 0){
            return $this->errorBackTo("只允许编辑自身资料");
        }

        $user = UserRepository::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];

        if($request['password']){
            $user->password = bcrypt($request['password']);
        }

        try {
            $roles = RoleRepository::getByWhereIn('id', $request['role_id']);

            if(empty($roles->toArray())){
                return $this->errorBackTo("用户角色不存在,请刷新页面并选择其他用户角色");
            }

            if($user->save()){
                $user->roles()->sync([]);
                foreach ($roles as $role) {
                    $user->attachRole($role);
                }

                return $this->successRoutTo('backend.user.index', "编辑用户成功");
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if(UserRepository::destroy($id)){
                return $this->successBackTo('删除用户成功');
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }
    }

    /**
     * 编辑个人信息
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile($id)
    {
        $user = UserRepository::getUserProfileById($id);
        $color = ['label-danger', 'label-success', 'label-info', 'label-warning', 'label-primary', 'label-black'];

        return view('backend.user.profile', compact('user', 'id', 'color'));
    }

    /**
     * 修改个人信息
     *
     * @param Request $request
     *
     * @return $this|mixed
     * @throws Exception
     */
    public function updateProfile(Request $request)
    {
        $data = $request->except(['_token', 'file']);

        try {
            $profile = UserProfileRepository::firstByWhere(['user_id' => $data['user_id']]);

            if($profile){
                $result = UserProfileRepository::updateByWhere(['user_id' => $data['user_id']], $data);
            } else {
                $result = UserProfileRepository::create($data);
            }

            if($result){
                return $this->successBackTo("修改个人信息成功");
            } else {
                throw new Exception("修改个人信息失败");
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }
    }

    /**
     * 异步上传用户头像
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function uploadAvatar(Request $request)
    {
        $file = $request->file('file');

        $uploadService = new UploadService($file, config('cowcat.uploads'));

        try {
            $result = $uploadService->upload();

            if($result['status'] == 0){
                return $this->responseJson($result);
            }

            if(File::create($result['data'])){
                return $this->responseJson($result);
            } else {
                throw new Exception("文件记录失败...");
            }
        }
        catch (\Exception $e) {
            return $this->responseJson($e->getMessage());
        }
    }
}
