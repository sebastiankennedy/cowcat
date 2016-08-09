<?php

namespace App\Presenters;

class ActionPresenter extends CommonPresenter
{
    public function getHandle()
    {
        return [
            [
                'icon'  => 'plus',
                'class' => 'success',
                'title' => '新增',
                'route' => 'backend.action.create',
            ],
        ];
    }
}