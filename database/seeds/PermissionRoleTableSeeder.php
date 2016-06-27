<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                'permission_id' => 40,
                'role_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 41,
                'role_id' => 1,
            ),
            2 => 
            array (
                'permission_id' => 40,
                'role_id' => 2,
            ),
            3 => 
            array (
                'permission_id' => 40,
                'role_id' => 3,
            ),
            4 => 
            array (
                'permission_id' => 41,
                'role_id' => 3,
            ),
        ));
        
        
    }
}
