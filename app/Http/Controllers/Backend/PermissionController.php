<?php

namespace App\Http\Controllers\Backend;

use App\Facades\PermissionRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Form\PermissionCreateForm;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * 权限管理控制器
 *
 * @package App\Http\Controllers\Backend
 */
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PermissionRepository::paginate(config('repository.page-limit'));

        return view('backend.permission.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Form\PermissionCreateForm $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionCreateForm $request)
    {
        try {
            if (PermissionRepository::create($request->all())) {
                return redirect()->route("permission.index")->withSuccess("新增权限成功");
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = PermissionRepository::find($id);
        switch ($permission->type) {
            case 'menu':
                $data = json_encode(PermissionRepository::getAllMenusTreeByPermission($permission));
                break;
        }

        return view('backend.permission.' . $permission->type, compact('data', 'id'));
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
        $data = PermissionRepository::find($id);

        return view('backend.permission.edit', compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission = PermissionRepository::find($id);
        $permission->name = $request['name'];
        $permission->type = $request['type'];
        $permission->description = $request['description'];
        $permission->display_name = $request['display_name'];

        try {
            if ($permission->save()) {
                return redirect()->back()->withSuccess("编辑权限成功");
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
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
            if (PermissionRepository::destroy($id)) {
                return redirect()->back()->withSuccess("删除权限成功");
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        }
    }


    /**
     * 关联菜单权限
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function associateMenus(Request $request)
    {
        $id = $request['id'];
        $menus = $request['menus'];

        try {
            $permisson = PermissionRepository::find($id);

            if ($permisson->menus()->sync($menus)) {
                return $this->responseJson(['status' => 1]);
            } else {
                return $this->responseJson(['status' => 0]);
            }
        } catch (\Exception $e) {
            return $this->responseJson(['status' => 0]);
        }
    }
}
