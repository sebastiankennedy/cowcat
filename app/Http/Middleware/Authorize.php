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
        dump(Route::current()->getActionName());

//        $routes = $this->router->getRoutes()->getRoutes();
//        dump($routes);
//        foreach ($routes as $route) {
//            dump($route->getActionName());
//        }

        if ($user['is_super_admin']) {
            return $next($request);
        }

        $previousUrl = URL::previous();

        if ( ! $request->ajax()) {

            if ($request->getMethod() == 'GET') {

                $route = Route::currentRouteName();
                $menus = UserRepository::getUserMenusPermissionsByUserModel($user);

                if ( ! in_array($route, $menus)) {

                    return view('backend.errors.403', compact('previousUrl'));
                }
            } else {

            }
        }

        return $next($request);
    }
}
