<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'User Manager', 'guard_name' => 'web']);
        Permission::create(['name' => 'Data Terminal', 'guard_name' => 'web']);
        Permission::create(['name' => 'Data Provider', 'guard_name' => 'web']);
        Permission::create(['name' => 'Data Pengunjung', 'guard_name' => 'web']);
        Permission::create(['name' => 'Data Keberangkatan', 'guard_name' => 'web']);
        Permission::create(['name' => 'Data Cancel', 'guard_name' => 'web']);
        Permission::create(['name' => 'User Manager', 'guard_name' => 'aplikasi']);
        Permission::create(['name' => 'Data Terminal', 'guard_name' => 'aplikasi']);
        Permission::create(['name' => 'Data Provider', 'guard_name' => 'aplikasi']);
        Permission::create(['name' => 'Data Pengunjung', 'guard_name' => 'aplikasi']);
        Permission::create(['name' => 'Data Keberangkatan', 'guard_name' => 'aplikasi']);
        Permission::create(['name' => 'Data Cancel', 'guard_name' => 'aplikasi']);
    }
}
