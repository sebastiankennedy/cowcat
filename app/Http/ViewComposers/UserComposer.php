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
        $links = self::getLinks();
        $search = [
            'route'=>'user.search',
            'inputs'=>[
                [
                    'type'=>'text',
                    'name'=>'name',
                    'placeholder'=>'用户名称'
                ],
            ]
        ];
        $view->with(compact('links','search'));
    }

    protected static function getLinks()
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
            ]
        ];
    }
}
