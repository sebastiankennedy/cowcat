<?php

namespace App\Repositories;

use Cache;

/**
* Menu Model Repository
*/
class MenuRepository extends CommonRepository
{
    const REDIS_ALL_MENUS_CACHE = 'redis_all_menus_cache';

    const REDIS_SIDEBAR_MENUS_CACHE = 'redis_sidebar_menus_cache';

    const REDIS_BREADCRUMBS_MENUS_CACHE = 'redis_breadcrumbs_menus_cache';

    const REDIS_ALL_DISPLAY_MENUS_CACHE = 'redis_all_display_menus_cache';

    public function getAllDisplayMenus()
    {
        $menus = Cache::get(self::REDIS_ALL_DISPLAY_MENUS_CACHE);

        if (empty($menus)) {
            $menus = $this->model->whereIsHide(0)->get()->toArray();
            Cache::forever(self::REDIS_ALL_DISPLAY_MENUS_CACHE, $menus);

            return $menus;
        } else {
            return $menus;
        }
    }
}
