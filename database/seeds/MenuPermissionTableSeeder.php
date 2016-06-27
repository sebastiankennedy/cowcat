<?php

use Illuminate\Database\Seeder;

class MenuPermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('menu_permission')->delete();

        \DB::table('menu_permission')->insert([
            0  =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 1,
                ],
            1  =>
                [
                    'permission_id' => 42,
                    'menu_id'       => 1,
                ],
            2  =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 2,
                ],
            3  =>
                [
                    'permission_id' => 42,
                    'menu_id'       => 2,
                ],
            4  =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 6,
                ],
            5  =>
                [
                    'permission_id' => 42,
                    'menu_id'       => 6,
                ],
            6  =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 7,
                ],
            7  =>
                [
                    'permission_id' => 42,
                    'menu_id'       => 7,
                ],
            8  =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 8,
                ],
            9  =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 9,
                ],
            10 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 10,
                ],
            11 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 11,
                ],
            12 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 12,
                ],
            13 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 13,
                ],
            14 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 14,
                ],
            15 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 17,
                ],
            16 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 18,
                ],
            17 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 19,
                ],
            18 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 20,
                ],
            19 =>
                [
                    'permission_id' => 42,
                    'menu_id'       => 20,
                ],
            20 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 21,
                ],
            21 =>
                [
                    'permission_id' => 42,
                    'menu_id'       => 21,
                ],
            22 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 22,
                ],
            23 =>
                [
                    'permission_id' => 42,
                    'menu_id'       => 22,
                ],
            24 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 23,
                ],
            25 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 24,
                ],
            26 =>
                [
                    'permission_id' => 42,
                    'menu_id'       => 24,
                ],
            27 =>
                [
                    'permission_id' => 43,
                    'menu_id'       => 24,
                ],
            28 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 25,
                ],
            29 =>
                [
                    'permission_id' => 42,
                    'menu_id'       => 25,
                ],
            30 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 26,
                ],
            31 =>
                [
                    'permission_id' => 42,
                    'menu_id'       => 26,
                ],
            32 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 27,
                ],
            33 =>
                [
                    'permission_id' => 42,
                    'menu_id'       => 27,
                ],
            34 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 51,
                ],
            35 =>
                [
                    'permission_id' => 43,
                    'menu_id'       => 51,
                ],
            36 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 52,
                ],
            37 =>
                [
                    'permission_id' => 43,
                    'menu_id'       => 52,
                ],
            38 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 53,
                ],
            39 =>
                [
                    'permission_id' => 43,
                    'menu_id'       => 53,
                ],
            40 =>
                [
                    'permission_id' => 40,
                    'menu_id'       => 54,
                ],
            41 =>
                [
                    'permission_id' => 43,
                    'menu_id'       => 54,
                ],
        ]);


    }
}
