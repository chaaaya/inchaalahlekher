<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Checkin;
use Illuminate\Auth\Access\Response;

class CheckinPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Implémentez votre logique ici
        return true; // Exemple : autoriser tous les utilisateurs
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Checkin $checkin): bool
    {
        // Implémentez votre logique ici
        return $user->id === $checkin->user_id;
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
    public function update(User $user, Checkin $checkin): bool
    {
        // Implémentez votre logique ici
        return $user->id === $checkin->user_id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Checkin $checkin): bool
    {
        // Implémentez votre logique ici
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Checkin $checkin): bool
    {
        // Implémentez votre logique ici
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Checkin $checkin): bool
    {
        // Implémentez votre logique ici
        return $user->hasRole('admin');
    }
}
