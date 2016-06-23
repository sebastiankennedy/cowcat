<?php

namespace App\Listeners\Subscribe;

use App\Facades\MenuRepository;
use App\Facades\UserRepository;

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
            'App\Events\clearUserPermissionCache',
            'App\Listeners\Subscribe\CacheEventSubscribe@clearUserPermissionCacheEvent'
        );

        $events->listen(
            'App\Events\clearMenuPermissionCache',
            'App\Listeners\Subscribe\CacheEventSubscribe@clearMenuPermissionCacheEvent'
        );
    }

    public function clearUserPermissionCache($event)
    {
        UserRepository::clearCache();
    }

    public function clearMenuPermissionCache($event)
    {
        MenuRepository::clearCache();
    }
}
