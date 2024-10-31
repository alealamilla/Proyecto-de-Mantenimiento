<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            [
                'name' => 'ROJO'
            ],
            [
                'name' => 'NEGRO'
            ],
            [
                'name' => 'BLANCO'
            ],
            [
                'name' => 'AZUL'
            ],
            [
                'name' => 'VERDE'
            ],
            [
                'name' => 'GRIS'
            ],
        ];

        foreach ($colors as $color) {
            Color::create($color);
        }
    }
}
