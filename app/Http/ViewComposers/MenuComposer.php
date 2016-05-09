<?php

namespace App\Http\ViewComposers;

use App\Facades\MenuRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class MenuComposer
{
    /**
     * 将数据绑定到视图
     *
     * @param  View  $view
     * @return mixed
     */
    public function compose(View $view)
    {
        $links = self::getLinks();
        $inputs = self::getInputs();
        $view->with(compact('links','inputs'));
    }

    protected static function getLinks()
    {
        return [
            [
            'url'=>route('menu.create'),
            'attr'=>[
                'class'=>'btn btn-box btn-info btn-flat'
            ],
            'title'=>'<i class="fa fa-plus"></i> 新增'
            ],
            [
                'url'=>'',
                'attr'=>[
                    'class'=>'btn btn-box btn-info btn-flat'
                ],
                'title'=>'<i class="fa fa-sort"></i> 排序',
            ]
        ];
    }

    protected static function getInputs()
    {

        return [
            'route'=>route('menu.search'),
            'method'=>'get',
            'class'=>'form-inline',
            'inputs'=>[
                [
                    'type'=>'select',
                    'name'=>'parent_id',
                    'value'=>[
                        ''=>'所有分类',
                        '0'=>'顶级分类'
                    ],
                    'selected'=>'',
                    'attributes'=>[
                        'class'=>'form-control select2',
                        'style'=>'width:100%'
                    ]
                ],
                [
                    'type'=>'text',
                    'name'=>'name',
                    'value'=>'',
                    'attributes'=>[
                        'placeholder'=>'菜单名称',
                        'class'=>'form-control',
                    ]
                ],
                [
                    'type'=>'text',
                    'name'=>'created_at',
                    'value'=>'',
                    'attributes'=>[
                        'class'=>'form-control',
                        'id'=>'created_at'
                    ]
                ],
                [
                    'type'=>'button',
                    'value'=>'<i class="fa fa-filter"></i> 筛选',
                    'attributes'=>[
                        'class'=>'btn btn-success btn-flat',
                        'type'=>'submit'
                    ]
                ],
            ]
        ];
    }
}
