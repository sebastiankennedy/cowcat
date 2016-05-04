<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class ComposerServiceProvider extends ServiceProvider
{
    private $menu;

    public function __construct($menu)
    {
        $this->menu = [
            'backend.layout.sidebar',
            'backend.layout.breadcrumbs',
        ];
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer($this->menu,"App\Http\ViewComposers\MenuComposer");
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
