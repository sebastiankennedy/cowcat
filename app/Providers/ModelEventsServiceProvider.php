<?php

namespace App\Providers;

use App\Facades\MenuRepository;
use App\Facades\UserRepository;
use App\Models\ActionPermission;
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
        $this->listenMenuModel();
        $this->listenActionPermissionModel();
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

    protected function listenActionPermissionModel()
    {
        ActionPermission::saved(function () {
            UserRepository::clearCache();
        });

        ActionPermission::deleted(function () {
            UserRepository::clearCache();
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
