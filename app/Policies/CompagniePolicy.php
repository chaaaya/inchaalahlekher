<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Compagnie;
use Illuminate\Auth\Access\Response;

class CompagniePolicy
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
    public function view(User $user, Compagnie $compagnie): bool
    {
        // Implémentez votre logique ici
        return true; // Exemple : autoriser tous les utilisateurs
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Implémentez votre logique ici
        return $user->hasRole('admin'); // Si vous avez une méthode hasRole
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Compagnie $compagnie): bool
    {
        // Implémentez votre logique ici
        return $user->hasRole('admin'); // Si vous avez une méthode hasRole
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Compagnie $compagnie): bool
    {
        // Implémentez votre logique ici
        return $user->hasRole('admin'); // Si vous avez une méthode hasRole
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Compagnie $compagnie): bool
    {
        // Implémentez votre logique ici
        return $user->hasRole('admin'); // Si vous avez une méthode hasRole
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Compagnie $compagnie): bool
    {
        // Implémentez votre logique ici
        return $user->hasRole('admin'); // Si vous avez une méthode hasRole
    }
}
