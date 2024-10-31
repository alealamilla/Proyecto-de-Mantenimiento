<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =  User::create([
            'name' => 'Ale Alamilla',
            'email' => 'a.alamilla@uadec.edu.mx',
            'password' => Hash::make('8442477138')
        ])->assignRole('admin');

        $user->givePermissionTo(Permission::all());

        $user =  User::create([
            'name' => 'Alfonso Hernandez',
            'email' => 'hernandez_alfonso@uadec.edu.mx',
            'password' => Hash::make('8442963079')
        ])->assignRole('admin');

        $user->givePermissionTo(Permission::all());
    }
}
