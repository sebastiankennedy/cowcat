<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('roles')->delete();

        \DB::table('roles')->insert([
            0 =>
                [
                    'id'           => 1,
                    'name'         => 'super-administrator',
                    'display_name' => '超级管理员',
                    'description'  => '拥有至高无上的权限',
                    'created_at'   => '2016-06-08 16:00:58',
                    'updated_at'   => '2016-06-12 16:12:14',
                ],
            1 =>
                [
                    'id'           => 2,
                    'name'         => 'general-administrator',
                    'display_name' => '普通管理员',
                    'description'  => '拥有绝大多数的权限',
                    'created_at'   => '2016-06-08 16:01:02',
                    'updated_at'   => '2016-06-12 16:12:21',
                ],
            2 =>
                [
                    'id'           => 3,
                    'name'         => 'tourist',
                    'display_name' => '游客',
                    'description'  => '游客',
                    'created_at'   => '2016-06-20 13:40:03',
                    'updated_at'   => '2016-06-20 13:40:03',
                ],
        ]);


    }
}
