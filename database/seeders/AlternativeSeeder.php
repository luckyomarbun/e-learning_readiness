<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alternative;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Alternative::create([
            'name' => 'Ahmad Fahim'
        ]);

        Alternative::create([
            'name' => 'Annisa Rizki'
        ]);

        Alternative::create([
            'name' => 'Laras Putri'
        ]);

        Alternative::create([
            'name' => 'Heru Rahmawan'
        ]);

        Alternative::create([
            'name' => 'Nurulita'
        ]);
    }
}
