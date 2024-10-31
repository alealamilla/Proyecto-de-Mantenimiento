<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Reception;
use Illuminate\Support\Facades\Auth;

class ReceptionObserver
{
    /**
     * Handle the Reception "created" event.
     */
    public function created(Reception $reception): void
    {
        $log = Log::create([
            'action' => 'NUEVA RECEPCIÓN',
            'description' => 'Se creó una nueva recepción: ' . $reception->id,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Reception "updated" event.
     */
    public function updated(Reception $reception): void
    {
        $log = Log::create([
            'action' => 'EDICIÓN RECEPCIÓN',
            'description' => 'Se edito la recepción: ' . $reception->id,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Reception "deleted" event.
     */
    public function deleted(Reception $reception): void
    {
        $log = Log::create([
            'action' => 'ELIMINACIÓN RECEPCIÓN',
            'description' => 'Se elimino la recepción: ' . $reception->id,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Reception "restored" event.
     */
    public function restored(Reception $reception): void
    {
        //
    }

    /**
     * Handle the Reception "force deleted" event.
     */
    public function forceDeleted(Reception $reception): void
    {
        //
    }
}
