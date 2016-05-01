<?php

namespace App\Http\ViewComposers;

use App\Facades\MenuRepository;
use Illuminate\Contracts\View\View;

class SiderbarComposer
{
    /**
     * 将数据绑定到视图
     * @param  View  $view
     * @return mixed
     */
    public function compose(View $view)
    {
        $menus = MenuRepository::getAllDisplayMenus();
        $tree = create_level_tree($menus);
        dump($tree);
        $view->with(compact('menus'));
    }
}
