<?php

namespace App\Presenters;

use Cache;

/**
* Menu View Presenters
*/
class MainPresenter extends CommonPresenter
{
    /**
     * 左侧栏视图缓存键
     */
    const REDIS_SIDEBAR_MENUS_CACHE = 'redis_sidebar_menus_view_cache';

    /**
     * 面包屑导航缓存键
     */
    const REDIS_BREADCRUMBS_MENUS_CACHE = 'redis_breadcrumbs_menus_view_cache:';

    protected $sidebar;

    protected $breadcrumbs;

    /**
     * 渲染左侧栏视图
     * @param  array  $menus
     * @return mixed
     */
    public function renderSidebar(array $menus)
    {
        $sidebar = Cache::get(self::REDIS_SIDEBAR_MENUS_CACHE);
        if ($sidebar) {
            return $sidebar;
        } else {
            $tree = create_node_tree($menus);
            $sidebar = '<ul class="sidebar-menu">';
            $sidebar.= self::makeSidebar($tree);
            $sidebar.= '</ul>';
            Cache::forever(self::REDIS_SIDEBAR_MENUS_CACHE, $sidebar);

            return $sidebar;
        }
    }

    /**
     * 渲染面包屑导航条视图
     * @param  array  $menus
     * @param  string $route
     * @return mixed
     */
    public function renderBreadcrumbs(array $menus, string $route)
    {
        $breadcrumbs = Cache::get(self::REDIS_BREADCRUMBS_MENUS_CACHE.$route);
        if ($breadcrumbs) {
            return $breadcrumbs;
        } else {
            $breadcrumbs = $this->makeBreadcrumbs($menus, $route);
            Cache::forever(self::REDIS_BREADCRUMBS_MENUS_CACHE.$route, $breadcrumbs);

            return "Todo breadcrumbs";
        }
    }

    protected static function makeSidebar(array $menus)
    {
        $sidebar = "";

        foreach ($menus as $menu) {
            if ($menu['hide'] == 0) {
                if ($menu['child']) {
                    $sidebar .=
                    '<li class="treeview">
                        <a href="javascript:void(0);">
                                <i class="' . $menu['icon'] . '"></i>
                                <span>' . $menu['name'] . '</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        <ul class="treeview-menu">'.
                            self::makeSidebar($menu['child']).'
                        </ul>
                    </li>';
                } else {
                    $sidebar .=
                    '<li>
                        <a href="'.route($menu['route']).'">
                            <i class="' . $menu['icon'] . '"></i>
                            <span> ' . $menu['name'] . '</span>
                        </a>
                    </li>';
                }
            }
        }

        return $sidebar;
    }

    protected static function makeBreadcrumbs(array $menus, string $route = '', $parent_id = 0)
    {
        $breadcrumbs = [];
        foreach ($menus as $key => $value) {
            if ($route) {
                if ($value['url'] == $route) {
                    $breadcrumbs[] = $value;
                    $breadcrumbs = array_merge($breadcrumbs, self::makeBreadcrumbs($menus, '', $value['parent_id']));
                }
            } else {
                if ($value['parent_id'] == $parent_id) {
                    $breadcrumbs[] = $value;
                    $breadcrumbs = array_merge($breadcrumbs, self::makeBreadcrumbs($menus, '', $value['parent_id']));
                }
            }
        }
        return $breadcrumbs;
    }
}
