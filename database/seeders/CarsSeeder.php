<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'owner_id' => '1',
                'color_id' => '6',
                'brand_id' => '7',
                'type_id' => '12',
                'placas' => 'abc-58',
                'year' => '2012',
            ],
            [
                'owner_id' => '2',
                'color_id' => '4',
                'brand_id' => '8',
                'type_id' => '13',
                'placas' => 'def-47',
                'year' => '2020',
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
