<?php

namespace App\Observers;

use App\Models\Color;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;

class ColorObserver
{
    /**
     * Handle the Color "created" event.
     */
    public function created(Color $color): void
    {
        $log = Log::create([
            'action' => 'NUEVO COLOR',
            'description' => 'Se creó un nuevo color: ' . $color->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Color "updated" event.
     */
    public function updated(Color $color): void
    {
        $log = Log::create([
            'action' => 'EDICIÓN DE COLOR',
            'description' => 'Se edito el color: ' . $color->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Color "deleted" event.
     */
    public function deleted(Color $color): void
    {
        $log = Log::create([
            'action' => 'ELIMINACIÓN DE COLOR',
            'description' => 'Se elimino el color: ' . $color->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Color "restored" event.
     */
    public function restored(Color $color): void
    {
        //
    }

    /**
     * Handle the Color "force deleted" event.
     */
    public function forceDeleted(Color $color): void
    {
        //
    }
}
