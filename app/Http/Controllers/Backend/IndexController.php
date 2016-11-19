<?php

namespace App\Http\Controllers\Backend;

use App\Facades\RoleRepository as Role;
use App\Facades\MenuRepository as Menu;
use App\Facades\ActionRepository as Action;
use App\Facades\PermissionRepository as Permission;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MessageBoard;

/**
 * Class IndexController
 * @package App\Http\Controllers\Backend
 */
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::count();
        $roles = Role::count();
        $actions = Action::count();
        $permissions = Permission::count();

        return view('backend.index.index', compact('menus', 'roles', 'actions', 'permissions'));
    }

    /**
     * 留言信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function messages()
    {
        $messages = MessageBoard::paginate();

        return view('backend.index.messages', compact('messages'));
    }
}
