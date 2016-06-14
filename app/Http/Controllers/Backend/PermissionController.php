<?php

namespace App\Http\Controllers\Backend;

use App\Facades\PermissionRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Form\PermissionCreateForm;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
     * @param  string $type
     *
     * @return \Illuminate\Http\Response
     */
    public function show($type)
    {
        $data = [];
        switch ($type) {
            case 'menu':
                $data = PermissionRepository::getAllMenusTree();
                break;
        }
        $data = json_encode($data);
        return view('backend.permission.' . $type, compact('data'));
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

    public function associateMenus()
    {
        return $this->responseJson(['data' => $request->all(), 'status' => 1]);
    }
}
