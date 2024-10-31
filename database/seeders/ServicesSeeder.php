<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'INSPECCION DE PUNTOS DE SEGURIDAD',
                'description' => 'Revisamoslos neumáticos, frenos, batería, tren motriz, dirección Y suspensión',
                'price' => '500.00'
            ],
            [
                'name' => 'CAMBIO DE ACEITE',
                'description' => 'Mantenimiento rapido con cambio de aceite y filtro',
                'price' => '500.00'
            ],
            [
                'name' => 'ALINEACIÓN Y ROTAMIENTO',
                'description' => 'Se revisa, alinean y rotan las llantas del vehiculo',
                'price' => '700.00'
            ],
            [
                'name' => 'REVISIÓN DE FILTROS DE AIRE',
                'description' => 'Mejora la calidad del aire dentro del vehículo y el rendimiento del motor.',
                'price' => '250.00'
            ],
            [
                'name' => 'PRECAUCIONES GENERALES',
                'description' => 'Se da un mantenimeinto generalen todos los puntos relevantes',
                'price' => '750.00'
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
