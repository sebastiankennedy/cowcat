<?php

namespace App\Repositories;

use Cache;

/**
 * User Model Repository
 */
class UserRepository extends CommonRepository
{
    const REDIS_USER_MENU_PERMISSIONS_CACHE = "redis_user_menu_permissions_cache";
    const REDIS_USER_ACTION_PERMISSIONS_CACHE = "redis_user_action_permissions_cache";

    public function getUserMenusPermissionsByUserModel($user)
    {
        $routes = Cache::get(self::REDIS_USER_MENU_PERMISSIONS_CACHE . $user->id);
        if (empty($routes)) {

            $roles = $user->roles;

            $permissions = [];
            foreach ($roles as $key => $role) {
                $permissions[] = $role->perms;
            }

            $menus = [];
            foreach ($permissions as $permission) {
                foreach ($permission as $item) {
                    if ($item->type != 'menu') {
                        continue;
                    }
                    $menus[] = $item->menus->toArray();
                }
            }

            foreach ($menus as $menu) {
                foreach ($menu as $value) {
                    $routes[] = $value['route'];
                }
            }

            if ($routes) {
                $routes = array_unique($routes);
            }

            Cache::forever(self::REDIS_USER_MENU_PERMISSIONS_CACHE . $user->id, $routes);
        }

        return $routes;
    }

    public function getUserActionPermissionsByUserModel($user)
    {
        $actions = Cache::get(self::REDIS_USER_ACTION_PERMISSIONS_CACHE . $user->id);

        if (empty($actions)) {
            $roles = $user->roles;
            $permissions = [];
            foreach ($roles as $key => $role) {
                $permissions[] = $role->perms;
            }

            $actionNames = [];
            foreach ($permissions as $permission) {
                foreach ($permission as $item) {
                    if ($item->type != 'action') {
                        continue;
                    }
                    $actionNames[] = $item->actions->toArray();
                }
            }

            foreach ($actionNames as $action) {
                foreach ($action as $value) {
                    $actions[] = $value['action'];
                }
            }

            if ($actions) {
                $actions = array_unique($actions);
            }
            Cache::forever(self::REDIS_USER_ACTION_PERMISSIONS_CACHE . $user->id, $actions);
        }

        return $actions;
    }
}
