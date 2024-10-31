<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

class StatusObserver
{
    /**
     * Handle the Status "created" event.
     */
    public function created(Status $status): void
    {
        $log = Log::create([
            'action' => 'NUEVO STATUS',
            'description' => 'Se creó un nuevo status: ' . $status->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Status "updated" event.
     */
    public function updated(Status $status): void
    {
        $log = Log::create([
            'action' => 'EDICION DE STATUS',
            'description' => 'Se editó el status: ' . $status->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Status "deleted" event.
     */
    public function deleted(Status $status): void
    {
        $log = Log::create([
            'action' => 'ELIMINACION DE STATUS',
            'description' => 'Se elimino el status: ' . $status->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Status "restored" event.
     */
    public function restored(Status $status): void
    {
        //
    }

    /**
     * Handle the Status "force deleted" event.
     */
    public function forceDeleted(Status $status): void
    {
        //
    }
}
