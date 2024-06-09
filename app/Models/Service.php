<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'nom',
        'description',
        // Ajoutez d'autres colonnes selon votre structure de base de données
    ];

    // Exemple de relation avec l'aéroport (One-to-Many inverse)
    public function aeroport()
    {
        return $this->belongsTo(Aeroport::class);
    }
}
