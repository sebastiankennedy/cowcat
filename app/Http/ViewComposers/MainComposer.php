<?php

namespace App\Http\ViewComposers;

use App\Facades\MenuRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class MainComposer
{
    /**
     * 将数据绑定到视图
     *
     * @param  View  $view
     * @return mixed
     */
    public function compose(View $view)
    {
        $route = Route::currentRouteName();
        $menus = MenuRepository::getAllDisplayMenus();
        $view->with(compact('menus','route'));
    }
}
