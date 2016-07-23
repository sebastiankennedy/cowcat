<?php

namespace App\Http\Controllers\Backend;

use App\Facades\ActionRepository;
use App\Facades\MenuRepository;
use App\Facades\PermissionRepository;
use App\Facades\RoleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = MenuRepository::count();
        $roles = RoleRepository::count();
        $actions = ActionRepository::count();
        $permissions = PermissionRepository::count();

        return view('backend.index.index', compact('menus', 'roles', 'actions', 'permissions'));
    }
}
