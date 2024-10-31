<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class WorkObserver
{
    /**
     * Handle the Work "created" event.
     */
    public function created(Work $work): void
    {
        $log = Log::create([
            'action' => 'NUEVO TRABAJO',
            'description' => 'Se creó un nuevo trabajo: ' . $work->id,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Work "updated" event.
     */
    public function updated(Work $work): void
    {
        $log = Log::create([
            'action' => 'EDICION TRABAJO',
            'description' => 'Se edito el trabajo: ' . $work->id,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Work "deleted" event.
     */
    public function deleted(Work $work): void
    {
        $log = Log::create([
            'action' => 'ELIMINACION TRABAJO',
            'description' => 'Se elimino el trabajo: ' . $work->id,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Work "restored" event.
     */
    public function restored(Work $work): void
    {
        //
    }

    /**
     * Handle the Work "force deleted" event.
     */
    public function forceDeleted(Work $work): void
    {
        //
    }
}
