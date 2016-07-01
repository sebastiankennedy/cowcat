<?php

namespace App\Providers;

use App\Events\Cache\ClearMenuCacheEvent;
use App\Models\Menu;
use Illuminate\Support\ServiceProvider;

class ModelEventsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->listenMenuModelEvents();
    }

    /**
     * 监听菜单模型事件.
     */
    public function listenMenuModelEvents()
    {
        Menu::saved(function () {
            event(new ClearMenuCacheEvent());
        });

        Menu::deleted(function () {
            event(new ClearMenuCacheEvent());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
