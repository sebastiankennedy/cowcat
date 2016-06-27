<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('permissions')->delete();

        \DB::table('permissions')->insert([
            0 =>
                [
                    'id'           => 40,
                    'type'         => 'menu',
                    'name'         => 'all.menus.visible',
                    'display_name' => '全部菜单可见',
                    'description'  => '全部菜单可见',
                    'created_at'   => '2016-06-14 11:53:36',
                    'updated_at'   => '2016-06-14 13:41:58',
                ],
            1 =>
                [
                    'id'           => 41,
                    'type'         => 'action',
                    'name'         => 'all.actions.available',
                    'display_name' => '所有操作权限',
                    'description'  => '所有操作权限',
                    'created_at'   => '2016-06-15 16:34:26',
                    'updated_at'   => '2016-06-15 16:34:26',
                ],
            2 =>
                [
                    'id'           => 42,
                    'type'         => 'menu',
                    'name'         => 'management.menu.visible',
                    'display_name' => '菜单管理页面可见',
                    'description'  => '菜单管理页面可见',
                    'created_at'   => '2016-06-20 14:07:13',
                    'updated_at'   => '2016-06-20 14:07:13',
                ],
            3 =>
                [
                    'id'           => 43,
                    'type'         => 'menu',
                    'name'         => 'management.permission.visible',
                    'display_name' => '权限管理页面可见',
                    'description'  => '权限管理页面可见',
                    'created_at'   => '2016-06-21 11:55:27',
                    'updated_at'   => '2016-06-21 12:19:55',
                ],
        ]);


    }
}
