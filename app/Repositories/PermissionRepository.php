<?php

namespace App\Repositories;

use App\Facades\MenuRepository;
/**
 */
class PermissionRepository extends CommonRepository
{
    public function getAllMenusTree()
    {
        $items = MenuRepository::getAllMenusLists();
        $data = [];
        foreach ($items as $key => $item) {
            $data[$key]['id'] = $item['id'];
            $data[$key]['pId'] = $item['parent_id'];
            $data[$key]['name'] = $item['name'];
            $data[$key]['open'] = true;
            $data[$key]['value'] = 1;
        }

        return $data;
    }
}
