<?php

namespace App\Repositories;

use App\Facades\PermissionRepository;

/**
 */
class RoleRepository extends CommonRepository
{
    public function getTypeGroupPermissionsByRole($role)
    {
        $data = [];
        $permissions = PermissionRepository::all()->toArray();
        $rolePermission = $role->perms()->lists('id')->toArray();


        foreach ($permissions as $key => $permission) {
            $data[$key]['id'] = $permission['id'];
            $data[$key]['pId'] = $permission['type'];
            $data[$key]['name'] = $permission['display_name'].'('.$permission['name'].')';
            $data[$key]['open'] = true;
            in_array($permission['id'], $rolePermission) && $data[$key]['checked'] = true;
        }

        foreach (config('cowcat.permission-type') as $key => $item) {
            $arr = [];
            $arr['id'] = $key;
            $arr['pId'] = 0;
            $arr['name'] = $item;
            $arr['open'] = true;
            array_push($data, $arr);
        }

        $arr = [];
        $arr['id'] = 0;
        $arr['pId'] = "";
        $arr['name'] = "全部权限";
        $arr['open'] = true;
        array_push($data, $arr);

        return $data;
    }
}
