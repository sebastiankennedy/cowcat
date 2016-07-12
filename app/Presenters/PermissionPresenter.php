<?php

namespace App\Presenters;

class PermissionPresenter extends CommonPresenter
{
    public function getHandle()
    {
        return [
            [
                'icon'  => 'plus',
                'class' => 'success',
                'title' => '新增',
                'route' => 'backend.permission.create',
            ],
        ];
    }
}