<?php

namespace Database\Seeders;

use App\Models\Sparepart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SparepartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spareparts = [
            [
                'name' => 'LLANTA',
                'price' => '1750.00'
            ],
            [
                'name' => 'BALATAS DELANTERAS',
                'price' => '1250.00'
            ],
            [
                'name' => 'PAR DE FAROS CON FOCOS',
                'price' => '3650.00'
            ],
            [
                'name' => 'KIT 4 AMORTIGUADORES',
                'price' => '5500.00'
            ],
            [
                'name' => 'CONTROL ELECTRICO',
                'price' => '750.00'
            ],
        ];

        foreach ($spareparts as $sparepart) {
            Sparepart::create($sparepart);
        }
    }
}
