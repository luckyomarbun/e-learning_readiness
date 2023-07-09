<?php

namespace Database\Seeders;

use App\Models\ValueWeight;
use Illuminate\Database\Seeder;

class ValueWeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tabel Tingkat Kepentingan menurut Saaty (1980)

        ValueWeight::create([
            'value' => 1,
            'description' => 'Sama pentingnya (Equal Importance)'
        ]);

        ValueWeight::create([
            'value' => 2,
            'description' => 'Sama hingga sedikit lebih penting'
        ]);

        ValueWeight::create([
            'value' => 3,
            'description' => 'Sedikit lebih penting (Slightly more importance)'
        ]);

        ValueWeight::create([
            'value' => 4,
            'description' => 'Sedikit lebih hingga jelas lebih penting'
        ]);

        ValueWeight::create([
            'value' => 5,
            'description' => 'Jelas lebih penting (Materially more importance)'
        ]);

        ValueWeight::create([
            'value' => 6,
            'description' => 'Jelas hingga sangat jelas lebih penting'
        ]);

        ValueWeight::create([
            'value' => 7,
            'description' => 'Sangat jelas lebih penting (Significantly more importance)'
        ]);

        ValueWeight::create([
            'value' => 8,
            'description' => 'Sangat jelas hingga mutlak lebih penting'
        ]);

        ValueWeight::create([
            'value' => 9,
            'description' => 'Mutlak lebih penting (Absolutely more importance)'
        ]);

        
    }
}
