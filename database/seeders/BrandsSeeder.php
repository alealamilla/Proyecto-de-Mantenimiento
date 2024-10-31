<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'HONDA'
            ],
            [
                'name' => 'TOYOTA'
            ],
            [
                'name' => 'SUZUKI'
            ],
            [
                'name' => 'BMW'
            ],
            [
                'name' => 'AUDI'
            ],
            [
                'name' => 'NISSAN'
            ],
            [
                'name' => 'FORD'
            ],
            [
                'name' => 'KIA'
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
