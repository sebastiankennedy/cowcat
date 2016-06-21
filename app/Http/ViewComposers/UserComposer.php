<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class UserComposer
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
        $params = self::getParams();
        $view->with(compact('handle', 'params'));
    }

    private static function gethandle()
    {
        return [
            [
                'icon'  => 'plus',
                'title' => '新增',
                'class' => 'success',
                'route' => 'backend.user.create',
            ],
        ];
    }

    private static function getParams()
    {
        return [
            'name' => old('name'),
        ];
    }
}
