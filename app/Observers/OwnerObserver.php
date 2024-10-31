<?php

namespace App\Observers;

use App\Models\Owner;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class OwnerObserver
{
    /**
     * Handle the Owner "created" event.
     */
    public function created(Owner $owner): void
    {
        $log = Log::create([
            'action' => 'NUEVO PROPIETARIO',
            'description' => 'Se creó un nuevo propietario: ' . $owner->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Owner "updated" event.
     */
    public function updated(Owner $owner): void
    {
        $log = Log::create([
            'action' => 'EDICION DE PROPIETARIO',
            'description' => 'Se edito el propietario: ' . $owner->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Owner "deleted" event.
     */
    public function deleted(Owner $owner): void
    {
        $log = Log::create([
            'action' => 'ELIMINACION DE PROPIETARIO',
            'description' => 'Se elimino el propietario: ' . $owner->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Owner "restored" event.
     */
    public function restored(Owner $owner): void
    {
        //
    }

    /**
     * Handle the Owner "force deleted" event.
     */
    public function forceDeleted(Owner $owner): void
    {
        //
    }
}
