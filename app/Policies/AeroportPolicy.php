<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Aeroport;
use Illuminate\Auth\Access\Response;

class AeroportPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Implémentez votre logique ici
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Aeroport $aeroport): bool
    {
        // Implémentez votre logique ici
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Implémentez votre logique ici
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Aeroport $aeroport): bool
    {
        // Implémentez votre logique ici
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Aeroport $aeroport): bool
    {
        // Implémentez votre logique ici
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Aeroport $aeroport): bool
    {
        // Implémentez votre logique ici
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Aeroport $aeroport): bool
    {
        // Implémentez votre logique ici
        return $user->hasRole('admin');
    }
}
