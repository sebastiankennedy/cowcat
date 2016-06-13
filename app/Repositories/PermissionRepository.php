<?php

namespace App\Repositories;

/**
 */
class PermissionRepository extends CommonRepository
{
    public function getPermissionNodes()
    {
        $model =$this->model;
        $items = $model::all();
        $nodes = [];

        foreach ($items as $item) {
            $nodes['id'] = $item->id;
        }

        return $items;
    }
}
