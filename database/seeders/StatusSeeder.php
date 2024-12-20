<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            [
                'name' => 'En espera'
            ],
            [
                'name' => 'En proceso'
            ],
            [
                'name' => 'Finalizado'
            ],
        ];

        foreach ($status as $statu) {
            Status::create($statu);
        }
    }
}
