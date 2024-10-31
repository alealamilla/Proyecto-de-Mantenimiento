<?php

namespace App\Observers;

use App\Models\Car;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class CarObserver
{
    /**
     * Handle the Car "created" event.
     */
    public function created(Car $car): void
    {
        $log = Log::create([
            'action' => 'NUEVO CARRO',
            'description' => 'Se creó un nuevo carro: ' . $car->placas,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Car "updated" event.
     */
    public function updated(Car $car): void
    {
        $log = Log::create([
            'action' => 'EDICION DE CARRO',
            'description' => 'Se edito el carro: ' . $car->placas,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Car "deleted" event.
     */
    public function deleted(Car $car): void
    {
        $log = Log::create([
            'action' => 'ELIMINACION DE CARRO',
            'description' => 'Se elimino el carro: ' . $car->placas,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Car "restored" event.
     */
    public function restored(Car $car): void
    {
        //
    }

    /**
     * Handle the Car "force deleted" event.
     */
    public function forceDeleted(Car $car): void
    {
        //
    }
}
