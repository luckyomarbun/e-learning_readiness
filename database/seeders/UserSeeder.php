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
         User::create([
             'name' => 'Admin',
             'username' => 'admin',
             'email' => 'admin@mail.com',
             'password' => bcrypt('password')
         ]);

         User::create([
            'name' => 'lucky',
            'username' => 'lucky',
            'email' => 'lucky@mail.com',
            'role' => 'user',
            'password' => bcrypt('password')
        ]);
    }
}
