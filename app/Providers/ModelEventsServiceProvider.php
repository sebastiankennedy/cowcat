<?php

namespace App\Providers;

use App\Facades\MenuRepository;
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
        self::listenMenuModel();
    }

    protected function listenMenuModel()
    {
        Menu::saved(function () {
            MenuRepository::clearCache();
        });

        Menu::deleted(function () {
            MenuRepository::clearCache();
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
