<?php

namespace App\Observers;

use App\Models\Type;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class TypeObserver
{
    /**
     * Handle the Type "created" event.
     */
    public function created(Type $type): void
    {
        $log = Log::create([
            'action' => 'NUEVO MODELO',
            'description' => 'Se creó un nuevo modelo: ' . $type->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Type "updated" event.
     */
    public function updated(Type $type): void
    {
        $log = Log::create([
            'action' => 'EDICION DE MODELO',
            'description' => 'Se edito el modelo: ' . $type->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Type "deleted" event.
     */
    public function deleted(Type $type): void
    {
        $log = Log::create([
            'action' => 'ELIMINACIÓN DE MODELO',
            'description' => 'Se elimino el modelo: ' . $type->name,
            'user_id' => (Auth::user()->id) ?? null
        ]);
    }

    /**
     * Handle the Type "restored" event.
     */
    public function restored(Type $type): void
    {
        //
    }

    /**
     * Handle the Type "force deleted" event.
     */
    public function forceDeleted(Type $type): void
    {
        //
    }
}
