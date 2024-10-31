<?php

namespace App\Observers;

use App\Models\Sparepart;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class SparepartObserver
{
    /**
     * Handle the Sparepart "created" event.
     */
    public function created(Sparepart $sparepart): void
    {
        $log = Log::create([
            'action' => 'NUEVA REFACCIÓN',
            'description' => 'Se creó una nueva refacción: ' . $sparepart->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Sparepart "updated" event.
     */
    public function updated(Sparepart $sparepart): void
    {
        $log = Log::create([
            'action' => 'EDICIÓN DE REFACCIÓN',
            'description' => 'Se edito la refacción: ' . $sparepart->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Sparepart "deleted" event.
     */
    public function deleted(Sparepart $sparepart): void
    {
        $log = Log::create([
            'action' => 'ELIMINACION DE REFACCIÓN',
            'description' => 'Se elimino la refacción: ' . $sparepart->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Sparepart "restored" event.
     */
    public function restored(Sparepart $sparepart): void
    {
        //
    }

    /**
     * Handle the Sparepart "force deleted" event.
     */
    public function forceDeleted(Sparepart $sparepart): void
    {
        //
    }
}
