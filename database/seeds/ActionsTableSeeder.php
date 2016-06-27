<?php

use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('actions')->delete();
        
        \DB::table('actions')->insert(array (
            0 => 
            array (
                'id' => 14,
                'group' => 'menu',
                'name' => '保存菜单',
                'action' => 'App\\Http\\Controllers\\Backend\\MenuController@store',
                'description' => '保存菜单',
                'state' => 1,
                'created_at' => '2016-06-24 17:10:59',
                'updated_at' => '2016-06-24 17:10:59',
            ),
            1 => 
            array (
                'id' => 15,
                'group' => 'menu',
                'name' => '显示菜单',
                'action' => 'App\\Http\\Controllers\\Backend\\MenuController@show',
                'description' => '显示菜单',
                'state' => 1,
                'created_at' => '2016-06-24 17:11:17',
                'updated_at' => '2016-06-24 17:11:17',
            ),
            2 => 
            array (
                'id' => 16,
                'group' => 'menu',
                'name' => '修改菜单',
                'action' => 'App\\Http\\Controllers\\Backend\\MenuController@update',
                'description' => '修改菜单',
                'state' => 1,
                'created_at' => '2016-06-24 17:11:28',
                'updated_at' => '2016-06-24 17:11:28',
            ),
            3 => 
            array (
                'id' => 17,
                'group' => 'menu',
                'name' => '删除菜单',
                'action' => 'App\\Http\\Controllers\\Backend\\MenuController@destroy',
                'description' => '删除菜单',
                'state' => 1,
                'created_at' => '2016-06-24 17:11:39',
                'updated_at' => '2016-06-24 17:11:39',
            ),
            4 => 
            array (
                'id' => 18,
                'group' => 'user',
                'name' => '保存用户',
                'action' => 'App\\Http\\Controllers\\Backend\\UserController@store',
                'description' => '保存用户',
                'state' => 1,
                'created_at' => '2016-06-24 17:13:38',
                'updated_at' => '2016-06-24 17:13:38',
            ),
            5 => 
            array (
                'id' => 19,
                'group' => 'user',
                'name' => '显示用户',
                'action' => 'App\\Http\\Controllers\\Backend\\UserController@show',
                'description' => '显示用户',
                'state' => 1,
                'created_at' => '2016-06-24 17:13:51',
                'updated_at' => '2016-06-24 17:13:51',
            ),
            6 => 
            array (
                'id' => 20,
                'group' => 'user',
                'name' => '修改用户',
                'action' => 'App\\Http\\Controllers\\Backend\\UserController@update',
                'description' => '修改用户',
                'state' => 1,
                'created_at' => '2016-06-24 17:14:08',
                'updated_at' => '2016-06-24 17:14:08',
            ),
            7 => 
            array (
                'id' => 21,
                'group' => 'user',
                'name' => '删除用户',
                'action' => 'App\\Http\\Controllers\\Backend\\UserController@destroy',
                'description' => '删除用户',
                'state' => 1,
                'created_at' => '2016-06-24 17:14:16',
                'updated_at' => '2016-06-24 17:14:16',
            ),
            8 => 
            array (
                'id' => 22,
                'group' => 'role',
                'name' => '角色关联权限',
                'action' => 'App\\Http\\Controllers\\Backend\\RoleController@associatePermission',
                'description' => '角色关联权限',
                'state' => 1,
                'created_at' => '2016-06-24 17:22:47',
                'updated_at' => '2016-06-24 17:22:47',
            ),
            9 => 
            array (
                'id' => 23,
                'group' => 'role',
                'name' => '保存角色',
                'action' => 'App\\Http\\Controllers\\Backend\\RoleController@store',
                'description' => '保存角色',
                'state' => 1,
                'created_at' => '2016-06-24 17:23:06',
                'updated_at' => '2016-06-24 17:23:06',
            ),
            10 => 
            array (
                'id' => 24,
                'group' => 'role',
                'name' => '显示角色',
                'action' => 'App\\Http\\Controllers\\Backend\\RoleController@show',
                'description' => '显示角色',
                'state' => 1,
                'created_at' => '2016-06-24 17:23:19',
                'updated_at' => '2016-06-24 17:23:19',
            ),
            11 => 
            array (
                'id' => 25,
                'group' => 'role',
                'name' => '修改角色',
                'action' => 'App\\Http\\Controllers\\Backend\\RoleController@update',
                'description' => '修改角色',
                'state' => 1,
                'created_at' => '2016-06-24 17:23:31',
                'updated_at' => '2016-06-24 17:23:31',
            ),
            12 => 
            array (
                'id' => 26,
                'group' => 'role',
                'name' => '删除角色',
                'action' => 'App\\Http\\Controllers\\Backend\\RoleController@destroy',
                'description' => '删除角色',
                'state' => 1,
                'created_at' => '2016-06-24 17:23:45',
                'updated_at' => '2016-06-24 17:23:45',
            ),
            13 => 
            array (
                'id' => 27,
                'group' => 'permission',
                'name' => '权限关联菜单',
                'action' => 'App\\Http\\Controllers\\Backend\\PermissionController@associateMenus',
                'description' => '权限关联菜单',
                'state' => 1,
                'created_at' => '2016-06-24 17:24:03',
                'updated_at' => '2016-06-24 17:24:03',
            ),
            14 => 
            array (
                'id' => 28,
                'group' => 'permission',
                'name' => '权限关联操作',
                'action' => 'App\\Http\\Controllers\\Backend\\PermissionController@associateActions',
                'description' => '权限关联操作',
                'state' => 1,
                'created_at' => '2016-06-24 17:24:15',
                'updated_at' => '2016-06-24 17:24:15',
            ),
            15 => 
            array (
                'id' => 29,
                'group' => 'permission',
                'name' => '保存权限',
                'action' => 'App\\Http\\Controllers\\Backend\\PermissionController@store',
                'description' => '保存权限',
                'state' => 1,
                'created_at' => '2016-06-24 17:26:30',
                'updated_at' => '2016-06-24 17:26:30',
            ),
            16 => 
            array (
                'id' => 30,
                'group' => 'permission',
                'name' => '显示权限',
                'action' => 'App\\Http\\Controllers\\Backend\\PermissionController@show',
                'description' => '显示权限',
                'state' => 1,
                'created_at' => '2016-06-24 17:26:42',
                'updated_at' => '2016-06-24 17:26:42',
            ),
            17 => 
            array (
                'id' => 31,
                'group' => 'permission',
                'name' => '修改权限',
                'action' => 'App\\Http\\Controllers\\Backend\\PermissionController@update',
                'description' => '修改权限',
                'state' => 1,
                'created_at' => '2016-06-24 17:26:54',
                'updated_at' => '2016-06-24 17:26:54',
            ),
            18 => 
            array (
                'id' => 32,
                'group' => 'permission',
                'name' => '删除权限',
                'action' => 'App\\Http\\Controllers\\Backend\\PermissionController@destroy',
                'description' => '删除权限',
                'state' => 1,
                'created_at' => '2016-06-24 17:27:04',
                'updated_at' => '2016-06-24 17:27:04',
            ),
            19 => 
            array (
                'id' => 33,
                'group' => 'action',
                'name' => '保存操作',
                'action' => 'App\\Http\\Controllers\\Backend\\ActionController@store',
                'description' => '保存操作',
                'state' => 1,
                'created_at' => '2016-06-24 17:28:02',
                'updated_at' => '2016-06-24 17:28:02',
            ),
            20 => 
            array (
                'id' => 34,
                'group' => 'action',
                'name' => '显示操作',
                'action' => 'App\\Http\\Controllers\\Backend\\ActionController@update',
                'description' => '显示操作',
                'state' => 0,
                'created_at' => '2016-06-24 17:28:11',
                'updated_at' => '2016-06-24 17:28:44',
            ),
            21 => 
            array (
                'id' => 35,
                'group' => 'action',
                'name' => '修改操作',
                'action' => 'App\\Http\\Controllers\\Backend\\ActionController@show',
                'description' => '修改操作',
                'state' => 0,
                'created_at' => '2016-06-24 17:28:20',
                'updated_at' => '2016-06-24 17:28:49',
            ),
            22 => 
            array (
                'id' => 36,
                'group' => 'action',
                'name' => '删除操作',
                'action' => 'App\\Http\\Controllers\\Backend\\ActionController@destroy',
                'description' => '删除操作',
                'state' => 1,
                'created_at' => '2016-06-24 17:29:19',
                'updated_at' => '2016-06-24 17:29:19',
            ),
            23 => 
            array (
                'id' => 37,
                'group' => 'log',
                'name' => '删除日志',
                'action' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@delete',
                'description' => '删除日志',
                'state' => 1,
                'created_at' => '2016-06-24 17:29:30',
                'updated_at' => '2016-06-24 17:29:30',
            ),
            24 => 
            array (
                'id' => 38,
                'group' => 'menu',
                'name' => '显示日志',
                'action' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@show',
                'description' => '显示日志',
                'state' => 1,
                'created_at' => '2016-06-24 17:29:40',
                'updated_at' => '2016-06-24 17:29:40',
            ),
            25 => 
            array (
                'id' => 39,
                'group' => 'menu',
                'name' => '下载日志',
                'action' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@download',
                'description' => '下载日志',
                'state' => 1,
                'created_at' => '2016-06-24 17:29:47',
                'updated_at' => '2016-06-24 17:29:47',
            ),
            26 => 
            array (
                'id' => 40,
                'group' => 'menu',
                'name' => '日志等级',
                'action' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@showByLevel',
                'description' => '日志等级',
                'state' => 1,
                'created_at' => '2016-06-24 17:30:07',
                'updated_at' => '2016-06-24 17:30:07',
            ),
        ));


    }
}
