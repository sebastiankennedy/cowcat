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
        $search = self::getInputs();
        $params = self::getParams();
        $view->with(compact('handle', 'search', 'params'));
    }

    private static function gethandle()
    {
        return [
            [
                'icon'  => 'plus',
                'title' => '新增',
                'class' => 'success',
                'route' => 'user.create',
            ],
            [
                'icon'  => 'user-plus',
                'title' => '赋权',
                'class' => 'info',
                'route' => 'user.create',
            ],
        ];
    }

    private static function getInputs()
    {
        return [
            'route'  => 'user.search',
            'inputs' => [
                [
                    'type'        => 'text',
                    'name'        => 'name',
                    'placeholder' => '用户名称',
                ],
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
