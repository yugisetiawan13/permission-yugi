<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name'       => 'admin',
            'guard_name' => 'web'
        ]);
        $role->givePermissionTo('User Manager');
        $role = Role::create([
            'name'       => 'customer',
            'guard_name' => 'aplikasi'
        ]);
        $role->givePermissionTo('Data Pengunjung');

    }
}
