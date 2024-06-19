<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'ville',
        'pays',
        'image',
        'lien',
        'aeroport_id',
    ];

    // Relation avec l'aéroport (une location appartient à un aéroport)
    public function airport()
    {
        return $this->belongsTo(Aeroport::class, 'aeroport_id');
    }
}
