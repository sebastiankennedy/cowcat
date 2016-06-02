<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class ComposerServiceProvider extends ServiceProvider
{
    private $main;

    public function __construct()
    {
        $this->main = [
            'backend.layout.sidebar',
            'backend.layout.breadcrumbs',
        ];

        $this->menu = [
            'backend.menu.index',
            'backend.menu.search'
        ];

        $this->user = [
            'backend.user.index',
            'backend.user.search'
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
