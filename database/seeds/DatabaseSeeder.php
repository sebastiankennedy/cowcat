<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('MenusTableSeeder');
        $this->call('ActionsTableSeeder');
        $this->call('RoleUserTableSeeder');
        $this->call('MenuPermissionTableSeeder');
        $this->call('PermissionRoleTableSeeder');
        $this->call('ActionPermissionTableSeeder');
    }
}
