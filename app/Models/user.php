<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Liste des attributs remplissables
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Assurez-vous que 'role' est fillable
        'numero_telephone',
        'subscription',
    ];

    // Attributs cachés
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Attributs ajoutés
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Définir les méthodes pour vérifier le rôle de l'utilisateur
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isResponsable()
    {
        return $this->role === 'responsable';
    }

    public function isClient()
    {
        return $this->role === 'client';
    }
}