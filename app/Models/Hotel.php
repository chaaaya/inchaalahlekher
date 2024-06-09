<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'adresse']; // Ajoutez 'adresse' à la liste des fillables

    // Exemple de relation avec les offres (Many-to-Many)
    public function offres()
    {
        return $this->belongsToMany(Offer::class, 'hotel_offre');
    }
}
