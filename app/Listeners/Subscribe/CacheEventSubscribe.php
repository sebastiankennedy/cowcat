<?php

namespace App\Listeners\Subscribe;

use App\Facades\MenuRepository;
use App\Facades\UserRepository;

/**
 * 缓存事件订阅器
 *
 * @package App\Listeners\Subscribe
 */
class CacheEventSubscribe
{
    /**
     * 注册侦听器的订阅者。
     *
     * @param  Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Cache\ClearUserPermissionCacheEvent',
            'App\Listeners\Subscribe\CacheEventSubscribe@clearUserPermissionCache'
        );

        $events->listen(
            'App\Events\Cache\ClearMenuCacheEvent',
            'App\Listeners\Subscribe\CacheEventSubscribe@clearMenuCache'
        );
    }

    /**
     * 清除用户权限缓存
     */
    public function clearUserPermissionCache()
    {
        UserRepository::clearCache();
    }

    /**
     * 清除菜单缓存
     */
    public function clearMenuCache()
    {
        MenuRepository::clearCache();
    }
}
