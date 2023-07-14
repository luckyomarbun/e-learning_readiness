<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

         User::create([
             'full_name' => 'Admin',
             'student_id_number' => '9871254321',
             'entry_year' => '2019',
             'student_major' => 'Information Systems',
             'username' => 'admin',
             'email' => 'admin@mail.com',
             'role' => 'admin',
             'password' => bcrypt('password')
         ]);

         User::create([
            'full_name' => 'Lucky Marbun',
            'student_id_number' => '987554321',
            'entry_year' => '2016',
            'student_major' => 'Computer Science',
            'username' => 'luckymarbun',
            'email' => 'luckymarbun@example.com',
            'role' => 'user',
            'password' => bcrypt('password')
        ]);

         User::create([
            'full_name' => 'Jane Smith',
            'student_id_number' => '987654321',
            'entry_year' => '2019',
            'student_major' => 'Information Systems',
            'username' => 'janesmith',
            'email' => 'janesmith@example.com',
            'role' => 'user',
            'password' => bcrypt('password')
        ]);

        User::create([
            'full_name' => 'John Doe',
            'student_id_number' => '123456789',
            'entry_year' => '2020',
            'student_major' => 'Computer Science',
            'username' => 'johndoe',
            'email' => 'johndoe@example.com',
            'role' => 'user',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'full_name' => 'David Johnson',
            'student_id_number' => '456789123',
            'entry_year' => '2021',
            'student_major' => 'Electrical Engineering',
            'username' => 'davidjohnson',
            'email' => 'davidjohnson@example.com',
            'role' => 'user',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'full_name' => 'Sarah Williams',
            'student_id_number' => '789123456',
            'entry_year' => '2018',
            'student_major' => 'Business Management',
            'username' => 'sarahwilliams',
            'email' => 'sarahwilliams@example.com',
            'role' => 'user',
            'password' => bcrypt('password')
        ]);

        User::create([
            'full_name' => 'Michael Brown',
            'student_id_number' => '321654987',
            'entry_year' => '2022',
            'student_major' => 'Graphic Design',
            'username' => 'michaelbrown',
            'email' => 'michaelbrown@example.com',
            'role' => 'user',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'full_name' => 'Emily Davis',
            'student_id_number' => '654789321',
            'entry_year' => '2017',
            'student_major' => 'English Language',
            'username' => 'emilydavis',
            'email' => 'emilydavis@example.com',
            'role' => 'user',
            'password' => bcrypt('password')
        ]);

        User::create([
            'full_name' => 'James Miller',
            'student_id_number' => '987321654',
            'entry_year' => '2023',
            'student_major' => 'Finance',
            'username' => 'jamesmiller',
            'email' => 'jamesmiller@example.com',
            'role' => 'user',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'full_name' => 'Olivia Wilson',
            'student_id_number' => '654123987',
            'entry_year' => '2020',
            'student_major' => 'Psychology',
            'username' => 'oliviawilson',
            'email' => 'oliviawilson@example.com',
            'role' => 'user',
            'password' => bcrypt('password')
        ]);

        User::create([
            'full_name' => 'Ethan Taylor',
            'student_id_number' => '321987654',
            'entry_year' => '2021',
            'student_major' => 'Mass Communication',
            'username' => 'ethantaylor',
            'email' => 'ethantaylor@example.com',
            'role' => 'user',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'full_name' => 'Sophia Anderson',
            'student_id_number' => '789654321',
            'entry_year' => '2019',
            'student_major' => 'Civil Engineering',
            'username' => 'sophiaanderson',
            'email' => 'sophiaanderson@example.com',
            'role' => 'user',
            'password' => bcrypt('password')
        ]);

            
        
    }
}
