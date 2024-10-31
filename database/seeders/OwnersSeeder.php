<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owners = [
            [
                'name' => 'Lily Alamilla ',
                'phone' => '8445697851',
                'email' => 'lily@gmail.com'
            ],
            [
                'name' => 'Nikole Troconis',
                'phone' => '8445769521',
                'email' => 'niko@gmail.com'
            ],
        ];

        foreach ($owners as $owner) {
            Owner::create($owner);
        }
    }
}
