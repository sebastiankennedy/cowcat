<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class ComposerServiceProvider extends ServiceProvider
{
    private $main, $menu, $user, $role, $permission;

    public function __construct()
    {
        $this->main = [
            'backend.layout.sidebar',
            'backend.layout.breadcrumbs',
        ];

        $this->menu = [
            'backend.menu.index',
            'backend.menu.search',
        ];

        $this->user = [
            'backend.user.index',
            'backend.user.search',
        ];

        $this->role = [
            'backend.role.index',
            'backend.role.search',
        ];

        $this->permission = [
            'backend.permission.index',
            'backend.permission.search',
        ];
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer($this->main, 'App\Http\ViewComposers\MainComposer');
        view()->composer($this->menu, 'App\Http\ViewComposers\MenuComposer');
        view()->composer($this->user, 'App\Http\ViewComposers\UserComposer');
        view()->composer($this->role, 'App\Http\ViewComposers\RoleComposer');
        view()->composer($this->permission, 'App\Http\ViewComposers\PermissionComposer');
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
