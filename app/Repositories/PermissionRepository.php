<?php

namespace App\Repositories;

use App\Facades\MenuRepository as MenuFacades;
use App\Facades\ActionRepository as ActionFacades;

/**
 * Permission Model Repository
 */
class PermissionRepository extends CommonRepository
{
    /**
     * 根据权限模型获取菜单关联树
     *
     * @param $permission
     *
     * @return array
     */
    public function getAllMenusTreeByPermissionModel($permission)
    {
        $data = [];
        $menus = MenuFacades::getAllMenusLists();
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

    /**
     * 根据权限模型获取操作关联树
     *
     * @param $permission
     *
     * @return array
     */
    public function getAllActionsByPermissionModel($permission)
    {
        $data = [];
        $actions = ActionFacades::all()->toArray();
        $permissions = $permission->actions()->lists('id')->toArray();

        foreach ($actions as $key => $action) {
            $data[$key]['id'] = $action['id'];
            $data[$key]['pId'] = $action['group'];
            $data[$key]['name'] = $action['name'];
            $data[$key]['open'] = true;
            $data[$key]['value'] = 1;
            if (in_array($action['id'], $permissions)) {
                $data[$key]['checked'] = true;
            }
        }

        foreach (config('cowcat.action-group') as $key => $value) {
            $group['id'] = $key;
            $group['pId'] = 0;
            $group['name'] = $value;
            $group['open'] = true;
            $group['value'] = 1;
            array_push($data, $group);
        }

        return $data;
    }
}
