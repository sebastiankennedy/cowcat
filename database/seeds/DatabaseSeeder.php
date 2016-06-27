<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UserTableSeeder::class);
        Model::reguard();
        $this->call('UsersTableSeeder');
        $this->call('ActionPermissionTableSeeder');
        $this->call('ActionsTableSeeder');
        $this->call('MenuPermissionTableSeeder');
        $this->call('MenusTableSeeder');
        $this->call('PermissionRoleTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('RoleUserTableSeeder');
        $this->call('RolesTableSeeder');
    }
}
