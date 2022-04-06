<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'admin'
        ]);

        $admin->assignRole('admin');

        $tatus = User::create([
            'name' => 'TataUsaha',
            'email' => 'tatus@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'tatausaha'
        ]);

        $tatus->assignRole('tatus');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'siswa'
        ]);

        $user->assignRole('user');
    }
}
