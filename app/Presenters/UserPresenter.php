<?php

namespace App\Presenters;

class UserPresenter extends CommonPresenter
{
    public function getHandle()
    {
        return [
            [
                'icon'  => 'plus',
                'class' => 'success',
                'title' => '新增',
                'route' => 'backend.user.create',
            ],
        ];
    }
}