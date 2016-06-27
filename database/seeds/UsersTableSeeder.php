<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@qq.com',
                'password' => '$2y$10$THzCWaxn/DPlwFGNX6o8/uEy5kK/0AFBa8z5GBG6ApyOgEvBwxwUG',
                'remember_token' => 'vnjLoBsi4zCqywOa0PBtWXz9ulfBTUHbjoACRXHe3HthmA8wDQO4bPBpOQs8',
                'created_at' => '2016-05-19 09:52:51',
                'updated_at' => '2016-06-27 09:06:34',
                'is_super_admin' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'luis',
                'email' => 'luisedware@qq.com',
                'password' => '$2y$10$THzCWaxn/DPlwFGNX6o8/uEy5kK/0AFBa8z5GBG6ApyOgEvBwxwUG',
                'remember_token' => 'BayXDcNkKpQkkbmaWaYA9ktn0eOybLCHeH2jTVZngiAJIQx3iy0agNvbDi35',
                'created_at' => '2016-06-14 17:18:09',
                'updated_at' => '2016-06-27 09:07:09',
                'is_super_admin' => 0,
            ),
        ));
        
        
    }
}
