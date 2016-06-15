<?php

namespace App\Http\Middleware;

use App\Facades\UserRepository;
use Closure;
use Route, Auth, URL;

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
        $user = Auth::user();

        if ($user['is_super_admin']) {
            return $next($request);
        }

        $previousUrl = URL::previous();

        if ( ! $request->ajax()) {

            if ($request->getMethod() == 'GET') {

                $route = Route::currentRouteName();
                $routes = UserRepository::getUserMenusPermissionsByUserModel($user);

                if ( ! in_array($route, $routes)) {

                    return view('backend.errors.403', compact('previousUrl'));
                }
            }else{

            }
        }

        return $next($request);
    }
}
