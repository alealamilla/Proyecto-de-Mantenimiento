<?php

namespace App\Observers;

use App\Models\Brand;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class BrandObserver
{
    /**
     * Handle the Brand "created" event.
     */
    public function created(Brand $brand): void
    {
        $log = Log::create([
            'action' => 'NUEVA MARCA',
            'description' => 'Se creó una nueva marca: ' . $brand->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Brand "updated" event.
     */
    public function updated(Brand $brand): void
    {
        $log = Log::create([
            'action' => 'EDICION DE MARCA',
            'description' => 'Se edito la marca: ' . $brand->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Brand "deleted" event.
     */
    public function deleted(Brand $brand): void
    {
        $log = Log::create([
            'action' => 'ELIMINACION DE MARCA',
            'description' => 'Se elimino la marca: ' . $brand->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Brand "restored" event.
     */
    public function restored(Brand $brand): void
    {
        //
    }

    /**
     * Handle the Brand "force deleted" event.
     */
    public function forceDeleted(Brand $brand): void
    {
        //
    }
}
