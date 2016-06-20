<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Router;
use App\Facades\UserRepository;
use Closure;
use Route, Auth, URL;

class Authorize
{
    protected $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        /* 判断当前用户是否为超级管理员 */
        if ($user['is_super_admin']) {
            return $next($request);
        }

        /* 获取当前 URL 当前的路由、控制器方法和上一页 */
        $route = Route::current()->getName();
        $action = Route::current()->getActionName();
        $previousUrl = URL::previous();

        if ( ! $request->ajax()) {

            if ($request->getMethod() == 'GET') {

                $menus = UserRepository::getUserMenusPermissionsByUserModel($user);

                if ( ! $menus) {
                    return view('backend.errors.403', compact('previousUrl'));
                }

                if ( ! in_array($route, $menus)) {

                    return view('backend.errors.403', compact('previousUrl'));
                }
            } else {
                $actions = UserRepository::getUserActionPermissionsByUserModel($user);

                if ( ! $actions) {
                    return view('backend.errors.403', compact('previousUrl'));
                }

                if ( ! in_array($action, $actions)) {

                    return view('backend.errors.403', compact('previousUrl'));
                }
            }
        }

        return $next($request);
    }
}
