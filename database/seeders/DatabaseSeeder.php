<?php

namespace Database\Seeders;

use App\Models\Alternative;
use App\Models\Question;
use App\Models\Section;
use App\Models\User;
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
            UserSeeder::class,
            SectionSeeder::class,
            QuestionSeeder::class,
            ScoreSeeder::class
        ]);
        // User::factory(3)->create();
    }
}
