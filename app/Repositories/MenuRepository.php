<?php

namespace App\Repositories;

use Cache;

/**
* Menu Model Repository
*/
class MenuRepository extends CommonRepository
{
    /**
     * 所有显示菜单缓存键
     */
    const REDIS_ALL_DISPLAY_MENUS_CACHE = 'redis_all_display_menus_array_cache';

    /**
     * 获取所有显示菜单
     *
     * @return array
     */
    public function getAllDisplayMenus()
    {
        $menus = Cache::get(self::REDIS_ALL_DISPLAY_MENUS_CACHE);

        if (empty($menus)) {
            $menus = $this->model->whereHide(0)->orderBy('sort','desc')->get()->toArray();
            Cache::forever(self::REDIS_ALL_DISPLAY_MENUS_CACHE, $menus);

            return $menus;
        } else {
            return $menus;
        }
    }

    /**
     * 清除所有的菜单缓存
     *
     * @return array
     */
    public function clearAllMenusCache()
    {
        Cache::forget(self::REDIS_ALL_DISPLAY_MENUS_CACHE);
    }
}
