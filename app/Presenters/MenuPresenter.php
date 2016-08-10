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
        if($status){
            return "隐藏";
        } else {
            return "显示";
        }
    }

    /**
     * @return array
     */
    public function getSearchParams()
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
                    'type' => 'date',
                    'name' => 'created_at',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function getHandleParams()
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

    /**
     * @return array
     */
    public function getTableParams()
    {
        return [
            'title'  => '菜单管理',
            'fields' => [
                'id'    => '菜单编号',
                'name'  => '菜单名称',
                'route' => '菜单路由',
                'sort'  => '菜单排序',
            ],
            'handle' => [
                [
                    'type'  => 'edit',
                    'title' => '编辑',
                    'route' => 'backend.menu.edit',
                ],
                [
                    'type'  => 'delete',
                    'title' => '删除',
                    'route' => 'backend.menu.destroy',
                ],
            ],
        ];
    }

    public function getPageParams()
    {
        return [
            'parent_id'  => old('parent_id'),
            'created_at' => old('created_at'),
        ];
    }
}
