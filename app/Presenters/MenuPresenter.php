<?php

namespace App\Presenters;

use App\Traits\Presenter\BasePresenterTrait;
use App\Facades\MenuRepository;

/**
 * Menu View Presenters
 */
class MenuPresenter extends CommonPresenter
{
    use  BasePresenterTrait;

    /**
     * 格式化显示隐藏状态
     *
     * @param  int $status
     *
     * @return string
     */
    public function showDisplayFormat($status)
    {
        if ($status) {
            return "隐藏";
        } else {
            return "显示";
        }
    }

    public function getSearch()
    {
        return [
            'route'  => 'backend.menu.search',
            'inputs' => [
                [
                    'type'    => 'select',
                    'name'    => 'parent_id',
                    'options' => MenuRepository::getAllTopMenus(),
                ],
                [
                    'type'        => 'text',
                    'name'        => 'name',
                    'placeholder' => '菜单名称',
                ],
                [
                    'type' => 'date',
                    'name' => 'created_at',
                ],
            ],
        ];
    }

    public function getHandle()
    {
        return [
            [
                'route' => 'backend.menu.create',
                'icon'  => 'plus',
                'class' => 'success',
                'title' => '新增',
            ],
        ];
    }
}
