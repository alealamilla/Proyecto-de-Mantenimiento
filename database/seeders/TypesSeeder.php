<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'CIVIC',
                'brand_id' => '1'
            ],
            [
                'name' => 'ACCORD',
                'brand_id' => '1'
            ],
            [
                'name' => 'HIGHLANDER',
                'brand_id' => '2'
            ],
            [
                'name' => 'COROLLA',
                'brand_id' => '2'
            ],
            [
                'name' => 'SWIFT',
                'brand_id' => '3'
            ],
            [
                'name' => 'IGNIS',
                'brand_id' => '3'
            ],
            [
                'name' => 'X-1 SUV',
                'brand_id' => '4'
            ],
            [
                'name' => 'A7',
                'brand_id' => '5'
            ],
            [
                'name' => 'Q5',
                'brand_id' => '5'
            ],
            [
                'name' => 'VERSA',
                'brand_id' => '6'
            ],
            [
                'name' => 'BRONCO',
                'brand_id' => '7'
            ],
            [
                'name' => 'RANGER',
                'brand_id' => '7'
            ],
            [
                'name' => 'NIRO',
                'brand_id' => '8'
            ],
            [
                'name' => 'SORENTO',
                'brand_id' => '8'
            ],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
