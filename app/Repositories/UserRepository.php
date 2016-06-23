<?php

namespace App\Repositories;

use Cache;

/**
 * User Model Repository
 */
class UserRepository extends CommonRepository
{
    /**
     *  菜单权限缓存标识
     */
    const USER_MENU_PERMISSIONS_CACHE = "user_menu_permissions_cache";

    /**
     * 操作权限缓存标识
     */
    const USER_ACTION_PERMISSIONS_CACHE = "user_action_permissions_cache";

    /**
     * 根据用户模型获取用户的菜单权限
     *
     * @param $user
     *
     * @return array|mixed
     */
    public function getUserMenusPermissionsByUserModel($user)
    {
        $routes = Cache::get(self::USER_MENU_PERMISSIONS_CACHE . $user->id);
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

            Cache::forever(self::USER_MENU_PERMISSIONS_CACHE . $user->id, $routes);
        }

        return $routes;
    }

    /**
     * 根据用户模型获取用户的操作权限
     *
     * @param $user
     *
     * @return array|mixed
     */
    public function getUserActionPermissionsByUserModel($user)
    {
        $actions = Cache::get(self::USER_ACTION_PERMISSIONS_CACHE . $user->id);

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
            Cache::forever(self::USER_ACTION_PERMISSIONS_CACHE . $user->id, $actions);
        }

        return $actions;
    }
}
