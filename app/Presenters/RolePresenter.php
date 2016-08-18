<?php

namespace App\Presenters;

class RolePresenter extends CommonPresenter
{
    public function getHandle()
    {
        return [
            [
                'icon'  => 'plus',
                'class' => 'success',
                'title' => '新增',
                'route' => 'backend.role.create',
            ],
        ];
    }
}