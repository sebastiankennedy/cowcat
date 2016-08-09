<?php

namespace App\Http\Middleware;

use App\Facades\UserRepository;
use Auth, Route, URL;
use Closure;

class Authorize
{
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
        /* 判断当前用户是否登录或缓存是否过期 */
        $user = Auth::user();
        if ( ! $user) {
            return redirect()->to('/auth/logout');
        }

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
        } else {

            $actions = UserRepository::getUserActionPermissionsByUserModel($user);

            if ( ! $actions) {
                return response()->json(['status' => 0, 'message' => '没有权限执行此操作']);
            }

            if ( ! in_array($action, $actions)) {

                return response()->json(['status' => 0, 'message' => '没有权限执行此操作']);
            }
        }

        return $next($request);
    }
}
