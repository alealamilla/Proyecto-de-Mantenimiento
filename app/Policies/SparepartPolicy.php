<?php

namespace App\Policies;

use App\Models\Sparepart;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SparepartPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('ver panel refacciones');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Sparepart $sparepart): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('crear refacciones');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Sparepart $sparepart): bool
    {
        return $user->can('editar refacciones');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Sparepart $sparepart): bool
    {
        return $user->can('eliminar refacciones');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Sparepart $sparepart): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Sparepart $sparepart): bool
    {
        return false;
    }
}
