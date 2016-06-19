<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\MenuRepository;
use App\Repositories\RoleRepository;
use App\Repositories\ActionRepository;
use App\Repositories\PermissionRepository;
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
        // 合并自定义配置文件
        $configuration = realpath(__DIR__ . '/../../config/repository.php');
        $this->mergeConfigFrom($configuration, 'repository');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMenuRepository();
        $this->registerUserRepository();
        $this->registerRoleRepository();
        $this->registerActionRepository();
        $this->registerPermissionRepository();
    }

    /**
     * Register the Menu Repository
     *
     * @return mixed
     */
    public function registerMenuRepository()
    {
        $this->app->singleton('menurepository', function ($app) {
            $model = config('repository.models.menu');
            $menu = new $model();
            $validator = $app['validator'];

            return new MenuRepository($menu, $validator);
        });

        $this->app->alias('menurepository', MenuRepository::class);
    }

    public function registerUserRepository()
    {
        $this->app->singleton('userrepository', function ($app) {
            $model = config('repository.models.user');
            $user = new $model();
            $validator = $app['validator'];

            return new UserRepository($user, $validator);
        });

        $this->app->alias('userrepository', UserRepository::class);
    }

    public function registerRoleRepository()
    {
        $this->app->singleton('rolerepository', function ($app) {
            $model = config('repository.models.role');
            $role = new $model();
            $validator = $app['validator'];

            return new RoleRepository($role, $validator);
        });

        $this->app->alias('rolerepository', RoleRepository::class);
    }

    public function registerActionRepository()
    {
        $this->app->singleton('actionrepository', function ($app) {
            $model = config('repository.models.action');
            $role = new $model();
            $validator = $app['validator'];

            return new ActionRepository($role, $validator);
        });

        $this->app->alias('actionrepository', ActionRepository::class);
    }

    public function registerPermissionRepository()
    {
        $this->app->singleton('permissionrepository', function ($app) {
            $model = config('repository.models.permission');
            $role = new $model();
            $validator = $app['validator'];

            return new PermissionRepository($role, $validator);
        });

        $this->app->alias('permissionrepository', PermissionRepository::class);
    }
}
