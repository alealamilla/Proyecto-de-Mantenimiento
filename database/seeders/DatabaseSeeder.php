<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(BrandsSeeder::class);
        $this->call(ColorsSeeder::class);
        $this->call(TypesSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(SparepartsSeeder::class);
        $this->call(OwnersSeeder::class);
        $this->call(CarsSeeder::class);
        
    }
}
