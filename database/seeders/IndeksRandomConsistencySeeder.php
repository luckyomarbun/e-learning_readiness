<?php

namespace Database\Seeders;

use App\Models\IndeksRandomConsistency;
use Illuminate\Database\Seeder;

class IndeksRandomConsistencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IndeksRandomConsistency::create([
            'amount' => 1,
            'value' => 0
        ]);

        IndeksRandomConsistency::create([
            'amount' => 2,
            'value' => 0
        ]);

        IndeksRandomConsistency::create([
            'amount' => 3,
            'value' => 0.58
        ]);

        IndeksRandomConsistency::create([
            'amount' => 4,
            'value' => 0.9
        ]);

        IndeksRandomConsistency::create([
            'amount' => 5,
            'value' => 1.12
        ]);

        IndeksRandomConsistency::create([
            'amount' => 6,
            'value' => 1.24
        ]);

        IndeksRandomConsistency::create([
            'amount' => 7,
            'value' => 1.32
        ]);

        IndeksRandomConsistency::create([
            'amount' => 8,
            'value' => 1.41
        ]);

        IndeksRandomConsistency::create([
            'amount' => 9,
            'value' => 1.45
        ]);

        IndeksRandomConsistency::create([
            'amount' => 10,
            'value' => 1.49
        ]);

        IndeksRandomConsistency::create([
            'amount' => 11,
            'value' => 1.51
        ]);

        IndeksRandomConsistency::create([
            'amount' => 12,
            'value' => 1.48
        ]);

        IndeksRandomConsistency::create([
            'amount' => 13,
            'value' => 1.56
        ]);

        IndeksRandomConsistency::create([
            'amount' => 14,
            'value' => 1.57
        ]);

        IndeksRandomConsistency::create([
            'amount' => 15,
            'value' => 1.59
        ]);

        
    }
}
