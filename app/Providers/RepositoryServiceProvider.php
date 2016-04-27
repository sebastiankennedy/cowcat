<?php

namespace App\Providers;

use App\Repositories\MenuRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMenuRepository();
    }

    public function registerMenuRepository()
    {
        $this->app->singleton('menurepository', function ($app) {
            $model = 'App\Models\Menu';
            $menu = new $model();
            $validator = $app['validator'];

            return new MenuRepository($menu, $validator);
        });

        $this->app->alias('menurepository', MenuRepository::class);
    }
}
