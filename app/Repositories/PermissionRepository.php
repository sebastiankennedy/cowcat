<?php

namespace App\Repositories;

use App\Facades\MenuRepository;

/**
 */
class PermissionRepository extends CommonRepository
{
    public function getAllMenusTreeByPermission($permission)
    {
        $data = [];
        $menus = MenuRepository::getAllMenusLists();
        $permissions = $permission->menus()->lists('id')->toArray();

        foreach ($menus as $key => $menu) {
            $data[$key]['id'] = $menu['id'];
            $data[$key]['pId'] = $menu['parent_id'];
            $data[$key]['name'] = $menu['name'];
            $data[$key]['open'] = true;
            $data[$key]['value'] = 1;
            if (in_array($menu['id'], $permissions)) {
                $data[$key]['checked'] = true;
            }
        }

        return $data;
    }
}
