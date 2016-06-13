<?php

namespace App\Repositories;

use Cache;

/**
 * Menu Model Repository
 */
class MenuRepository extends CommonRepository
{
    /**
     * 所有菜单缓存键
     */
    const REDIS_ALL_MENUS_CACHE = 'redis_all_menus_cache';

    /**
     *所有顶级显示菜单缓存键
     */
    const REDIS_ALL_TOP_MENUS_CACHE = 'redis_all_top_menus_cache';

    /**
     * 所有显示菜单缓存键
     */
    const REDIS_ALL_DISPLAY_MENUS_CACHE = 'redis_all_display_menus_array_cache';

    /**
     * 获取所有菜单
     *
     * @return array
     */
    public function getAllMenusLists()
    {
        $menus = Cache::get(self::REDIS_ALL_MENUS_CACHE);

        if (empty($menus)) {
            $menus = $this->model->all();
            Cache::forever(self::REDIS_ALL_MENUS_CACHE, $menus);

            return $menus;
        } else {
            return $menus;
        }
    }

    /**
     * 获取所有显示菜单
     *
     * @return array
     */
    public function getAllDisplayMenus()
    {
        $menus = Cache::get(self::REDIS_ALL_DISPLAY_MENUS_CACHE);

        if (empty($menus)) {
            $menus = $this->model->whereHide(0)->orderBy('sort', 'asc')->get()->toArray();
            Cache::forever(self::REDIS_ALL_DISPLAY_MENUS_CACHE, $menus);

            return $menus;
        } else {
            return $menus;
        }
    }

    /**
     * 获取所有顶级显示菜单
     *
     * @return mixed
     */
    public function getAllTopMenus()
    {
        $menus = Cache::get(self::REDIS_ALL_TOP_MENUS_CACHE);

        if (empty($menus)) {
            $menu[''] = '所有菜单';
            $menus = $this->model->whereHide(0)->whereParentId(0)->orderBy('sort', 'desc')->lists('name', 'id')->toArray();
            $menus = $menu + $menus;
            Cache::forever(self::REDIS_ALL_TOP_MENUS_CACHE, $menus);

            return $menus;
        } else {
            return $menus;
        }
    }

    /**
     * 根据菜单ID获取子菜单
     *
     * @param $id
     *
     * @return mixed
     */
    public function getChildMenusById($id)
    {
        return $this->model->where('parent_id', '=', $id)->get()->toArray();
    }

    /**
     * 清除所有的菜单缓存
     *
     * @return array
     */
    public function clearAllMenusCache()
    {
        Cache::forget(self::REDIS_ALL_MENUS_CACHE);
        Cache::forget(self::REDIS_ALL_TOP_MENUS_CACHE);
        Cache::forget(self::REDIS_ALL_DISPLAY_MENUS_CACHE);
    }
}
