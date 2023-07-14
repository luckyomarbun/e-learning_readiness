<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Section::truncate();
        Schema::enableForeignKeyConstraints();
        Section::create([
            'id' => 1,
            'value' => 'Technological Skills'
        ]);

        Section::create([
            'id' => 2,
            'value' => 'Study Habits & Skills'
        ]);

        Section::create([
            'id' => 3,
            'value' => 'Cognitive Preseence'
        ]);

        Section::create([
            'id' => 4,
            'value' => 'Teaching Preseence'
        ]);

        Section::create([
            'id' => 5,
            'value' => 'Social Preseence'
        ]);
    }
}
