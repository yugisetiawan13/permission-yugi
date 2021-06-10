<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Aplikasi;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('admin');

        // $user = Aplikasi::create([
        //     'name'         => 'customer',
        //     'user_id'      => 1,
        //     'descriptions' => "aplikasi",
        //     'api_token'    => Str::random(40)
        // ]);
        // $user->assignRole('customer');
    }
}
