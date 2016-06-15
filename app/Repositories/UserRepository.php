<?php

namespace App\Repositories;

use Cache;

/**
 * User Model Repository
 */
class UserRepository extends CommonRepository
{
    const REDIS_USER_MENU_PERMISSIONS_CACHE = "redis_user_menu_permissions_cache";

    public function getUserMenusPermissionsByUserModel($user)
    {
        $routes = Cache::get(self::REDIS_USER_MENU_PERMISSIONS_CACHE . $user->id);
        if (empty($routes)) {

            $roles = $user->roles;

            foreach ($roles as $key => $role) {
                $permissions[] = $role->perms;
            }

            foreach ($permissions as $permission) {
                foreach ($permission as $item) {
                    if($item->type != 'menu'){
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

            Cache::forever(self::REDIS_USER_MENU_PERMISSIONS_CACHE . $user->id, $routes);
        }

        return $routes;
    }
}
