<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('menus')->delete();

        \DB::table('menus')->insert([
            0  =>
                [
                    'id'          => 1,
                    'parent_id'   => 24,
                    'icon'        => 'fa fa-list-alt',
                    'name'        => '菜单管理',
                    'route'       => 'backend.menu',
                    'description' => '菜单管理',
                    'sort'        => 11,
                    'hide'        => 0,
                    'created_at'  => '2016-05-03 19:55:02',
                    'updated_at'  => '2016-06-22 17:17:01',
                ],
            1  =>
                [
                    'id'          => 2,
                    'parent_id'   => 1,
                    'icon'        => 'fa fa-list',
                    'name'        => '菜单列表',
                    'route'       => 'backend.menu.index',
                    'description' => '菜单列表',
                    'sort'        => 12,
                    'hide'        => 0,
                    'created_at'  => '2016-05-03 20:15:42',
                    'updated_at'  => '2016-06-02 15:34:42',
                ],
            2  =>
                [
                    'id'          => 6,
                    'parent_id'   => 1,
                    'icon'        => 'fa fa-plus',
                    'name'        => '新增菜单',
                    'route'       => 'backend.menu.create',
                    'description' => '新增菜单',
                    'sort'        => 13,
                    'hide'        => 0,
                    'created_at'  => '2016-05-03 20:26:23',
                    'updated_at'  => '2016-06-02 15:34:47',
                ],
            3  =>
                [
                    'id'          => 7,
                    'parent_id'   => 1,
                    'icon'        => 'fa fa-edit',
                    'name'        => '菜单编辑',
                    'route'       => 'backend.menu.edit',
                    'description' => '菜单编辑',
                    'sort'        => 0,
                    'hide'        => 1,
                    'created_at'  => '2016-05-04 17:49:50',
                    'updated_at'  => '2016-06-03 17:53:39',
                ],
            4  =>
                [
                    'id'          => 8,
                    'parent_id'   => 24,
                    'icon'        => 'fa fa-info',
                    'name'        => '日志管理',
                    'route'       => 'log-viewer',
                    'description' => '日志管理',
                    'sort'        => 21,
                    'hide'        => 0,
                    'created_at'  => '2016-05-11 10:52:22',
                    'updated_at'  => '2016-05-31 09:27:10',
                ],
            5  =>
                [
                    'id'          => 9,
                    'parent_id'   => 8,
                    'icon'        => 'fa fa-list',
                    'name'        => '日志列表',
                    'route'       => 'log-viewer::logs.list',
                    'description' => '日志列表',
                    'sort'        => 22,
                    'hide'        => 0,
                    'created_at'  => '2016-05-11 11:03:49',
                    'updated_at'  => '2016-05-11 11:03:49',
                ],
            6  =>
                [
                    'id'          => 10,
                    'parent_id'   => 8,
                    'icon'        => 'fa fa-pie-chart',
                    'name'        => '日志统计',
                    'route'       => 'log-viewer::dashboard',
                    'description' => '日志统计',
                    'sort'        => 23,
                    'hide'        => 0,
                    'created_at'  => '2016-05-11 11:04:30',
                    'updated_at'  => '2016-05-11 11:04:30',
                ],
            7  =>
                [
                    'id'          => 11,
                    'parent_id'   => 24,
                    'icon'        => 'fa fa-user',
                    'name'        => '用户管理',
                    'route'       => 'backend.user',
                    'description' => '用户管理',
                    'sort'        => 31,
                    'hide'        => 0,
                    'created_at'  => '2016-05-31 09:18:59',
                    'updated_at'  => '2016-06-02 15:33:29',
                ],
            8  =>
                [
                    'id'          => 12,
                    'parent_id'   => 11,
                    'icon'        => 'fa fa-list',
                    'name'        => '用户管理',
                    'route'       => 'backend.user.index',
                    'description' => '用户管理',
                    'sort'        => 32,
                    'hide'        => 0,
                    'created_at'  => '2016-05-31 09:23:28',
                    'updated_at'  => '2016-05-31 09:23:28',
                ],
            9  =>
                [
                    'id'          => 13,
                    'parent_id'   => 11,
                    'icon'        => 'fa fa-plus',
                    'name'        => '新增用户',
                    'route'       => 'backend.user.create',
                    'description' => '新增用户',
                    'sort'        => 33,
                    'hide'        => 0,
                    'created_at'  => '2016-05-31 09:29:54',
                    'updated_at'  => '2016-05-31 09:29:54',
                ],
            10 =>
                [
                    'id'          => 14,
                    'parent_id'   => 11,
                    'icon'        => 'fa fa-edit',
                    'name'        => '编辑用户',
                    'route'       => 'backend.user.edit',
                    'description' => '编辑用户',
                    'sort'        => 0,
                    'hide'        => 1,
                    'created_at'  => '2016-05-31 09:36:54',
                    'updated_at'  => '2016-06-03 17:11:48',
                ],
            11 =>
                [
                    'id'          => 17,
                    'parent_id'   => 24,
                    'icon'        => 'fa fa-users',
                    'name'        => '角色管理',
                    'route'       => 'backend.role',
                    'description' => '角色管理',
                    'sort'        => 41,
                    'hide'        => 0,
                    'created_at'  => '2016-06-12 09:51:26',
                    'updated_at'  => '2016-06-12 09:51:26',
                ],
            12 =>
                [
                    'id'          => 18,
                    'parent_id'   => 17,
                    'icon'        => 'fa fa-list',
                    'name'        => '角色列表',
                    'route'       => 'backend.role.index',
                    'description' => '角色列表',
                    'sort'        => 42,
                    'hide'        => 0,
                    'created_at'  => '2016-06-12 09:52:06',
                    'updated_at'  => '2016-06-12 09:52:06',
                ],
            13 =>
                [
                    'id'          => 19,
                    'parent_id'   => 17,
                    'icon'        => 'fa fa-plus',
                    'name'        => '新增角色',
                    'route'       => 'backend.role.create',
                    'description' => '新增角色',
                    'sort'        => 43,
                    'hide'        => 0,
                    'created_at'  => '2016-06-12 09:52:30',
                    'updated_at'  => '2016-06-12 10:02:30',
                ],
            14 =>
                [
                    'id'          => 20,
                    'parent_id'   => 24,
                    'icon'        => 'fa fa-check',
                    'name'        => '权限管理',
                    'route'       => 'backend.permission',
                    'description' => '权限管理',
                    'sort'        => 51,
                    'hide'        => 0,
                    'created_at'  => '2016-06-12 10:00:44',
                    'updated_at'  => '2016-06-12 10:00:44',
                ],
            15 =>
                [
                    'id'          => 21,
                    'parent_id'   => 20,
                    'icon'        => 'fa fa-list',
                    'name'        => '权限列表',
                    'route'       => 'backend.permission.index',
                    'description' => '权限列表',
                    'sort'        => 52,
                    'hide'        => 0,
                    'created_at'  => '2016-06-12 10:01:12',
                    'updated_at'  => '2016-06-12 10:01:12',
                ],
            16 =>
                [
                    'id'          => 22,
                    'parent_id'   => 20,
                    'icon'        => 'fa fa-plus',
                    'name'        => '新增权限',
                    'route'       => 'backend.permission.create',
                    'description' => '新增权限',
                    'sort'        => 53,
                    'hide'        => 0,
                    'created_at'  => '2016-06-12 10:01:58',
                    'updated_at'  => '2016-06-12 10:01:58',
                ],
            17 =>
                [
                    'id'          => 23,
                    'parent_id'   => 0,
                    'icon'        => 'fa fa-tachometer',
                    'name'        => '后台首页',
                    'route'       => 'backend.index.index',
                    'description' => '后台首页',
                    'sort'        => 0,
                    'hide'        => 0,
                    'created_at'  => '2016-06-12 21:32:14',
                    'updated_at'  => '2016-06-12 21:45:16',
                ],
            18 =>
                [
                    'id'          => 24,
                    'parent_id'   => 0,
                    'icon'        => 'fa fa-desktop',
                    'name'        => '系统配置',
                    'route'       => 'backend.system',
                    'description' => '系统配置',
                    'sort'        => 1,
                    'hide'        => 0,
                    'created_at'  => '2016-06-13 09:45:49',
                    'updated_at'  => '2016-06-13 09:45:49',
                ],
            19 =>
                [
                    'id'          => 25,
                    'parent_id'   => 1,
                    'icon'        => 'fa fa-search',
                    'name'        => '菜单查询',
                    'route'       => 'backend.menu.search',
                    'description' => '菜单查询',
                    'sort'        => 14,
                    'hide'        => 0,
                    'created_at'  => '2016-06-20 09:53:19',
                    'updated_at'  => '2016-06-20 09:53:19',
                ],
            20 =>
                [
                    'id'          => 26,
                    'parent_id'   => 20,
                    'icon'        => '',
                    'name'        => '编辑权限',
                    'route'       => 'backend.permission.edit',
                    'description' => '编辑权限',
                    'sort'        => 0,
                    'hide'        => 1,
                    'created_at'  => '2016-06-21 11:58:39',
                    'updated_at'  => '2016-06-21 11:58:39',
                ],
            21 =>
                [
                    'id'          => 27,
                    'parent_id'   => 20,
                    'icon'        => '',
                    'name'        => '关联权限',
                    'route'       => 'backend.permission.associate',
                    'description' => '关联权限',
                    'sort'        => 0,
                    'hide'        => 1,
                    'created_at'  => '2016-06-21 11:59:06',
                    'updated_at'  => '2016-06-21 11:59:06',
                ],
            22 =>
                [
                    'id'          => 51,
                    'parent_id'   => 24,
                    'icon'        => 'fa fa-keyboard-o',
                    'name'        => '操作管理',
                    'route'       => 'backend.action',
                    'description' => '操作管理',
                    'sort'        => 60,
                    'hide'        => 0,
                    'created_at'  => '2016-06-24 15:41:28',
                    'updated_at'  => '2016-06-24 15:43:06',
                ],
            23 =>
                [
                    'id'          => 52,
                    'parent_id'   => 51,
                    'icon'        => 'fa fa-plus',
                    'name'        => '新增操作',
                    'route'       => 'backend.action.create',
                    'description' => '新增操作',
                    'sort'        => 62,
                    'hide'        => 0,
                    'created_at'  => '2016-06-24 15:45:35',
                    'updated_at'  => '2016-06-24 15:45:35',
                ],
            24 =>
                [
                    'id'          => 53,
                    'parent_id'   => 51,
                    'icon'        => 'fa fa-list',
                    'name'        => '操作列表',
                    'route'       => 'backend.action.index',
                    'description' => '操作列表',
                    'sort'        => 61,
                    'hide'        => 0,
                    'created_at'  => '2016-06-24 15:46:07',
                    'updated_at'  => '2016-06-24 15:46:39',
                ],
            25 =>
                [
                    'id'          => 54,
                    'parent_id'   => 51,
                    'icon'        => '',
                    'name'        => '操作编辑',
                    'route'       => 'backend.action.edit',
                    'description' => '操作编辑',
                    'sort'        => 0,
                    'hide'        => 1,
                    'created_at'  => '2016-06-24 15:50:25',
                    'updated_at'  => '2016-06-24 15:50:25',
                ],
            26 =>
                [
                    'id'          => 55,
                    'parent_id'   => 17,
                    'icon'        => '',
                    'name'        => '角色编辑',
                    'route'       => 'backend.role.edit',
                    'description' => '角色编辑',
                    'sort'        => 0,
                    'hide'        => 1,
                    'created_at'  => '2016-06-24 17:16:17',
                    'updated_at'  => '2016-06-24 17:22:18',
                ],
            27 =>
                [
                    'id'          => 56,
                    'parent_id'   => 17,
                    'icon'        => '',
                    'name'        => '角色关联权限',
                    'route'       => 'backend.role.permission',
                    'description' => '角色关联权限',
                    'sort'        => 0,
                    'hide'        => 1,
                    'created_at'  => '2016-06-24 17:21:24',
                    'updated_at'  => '2016-06-24 17:21:24',
                ],
        ]);


    }
}
