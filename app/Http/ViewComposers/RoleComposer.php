<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class RoleComposer
{
    /**
     * 将数据绑定到视图
     *
     * @param  View $view
     *
     * @return mixed
     */
    public function compose(View $view)
    {
        $handle = self::gethandle();
        $view->with(compact('handle'));
    }

    private static function gethandle()
    {
        return [
            [
                'icon'  => 'plus',
                'title' => '新增',
                'class' => 'success',
                'route' => 'backend.role.create',
            ],
        ];
    }
}
