<?php

namespace App\Observers;

use App\Models\Service;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class ServiceObserver
{
    /**
     * Handle the Service "created" event.
     */
    public function created(Service $service): void
    {
        $log = Log::create([
            'action' => 'NUEVO SERVICIO',
            'description' => 'Se creó un nuevo servicio: ' . $service->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Service "updated" event.
     */
    public function updated(Service $service): void
    {
        $log = Log::create([
            'action' => 'EDICION DE SERVICIO',
            'description' => 'Se edito el servicio: ' . $service->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Service "deleted" event.
     */
    public function deleted(Service $service): void
    {
        $log = Log::create([
            'action' => 'ELIMINACIÓN DE SERVICIO',
            'description' => 'Se elimino el servicio: ' . $service->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Service "restored" event.
     */
    public function restored(Service $service): void
    {
        //
    }

    /**
     * Handle the Service "force deleted" event.
     */
    public function forceDeleted(Service $service): void
    {
        //
    }
}
