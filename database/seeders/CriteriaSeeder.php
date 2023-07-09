<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criteria;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criteria::create([
            'name' => 'Nilai Rata-Rata'
        ]);

        Criteria::create([
            'name' => 'Penghasilan Orang Tua'
        ]);

        Criteria::create([
            'name' => 'Jumlah Saudara Kandung'
        ]);

        Criteria::create([
            'name' => 'Prestasi Akademik dan Non-akademik'
        ]);

        Criteria::create([
            'name' => 'Kepribadian'
        ]);
    }
}
