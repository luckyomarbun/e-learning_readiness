<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ValueWeightSeeder::class,
            IndeksRandomConsistencySeeder::class,
            AlternativeSeeder::class,
            CriteriaSeeder::class,
            UserSeeder::class
        ]);
        // User::factory(3)->create();
    }
}
