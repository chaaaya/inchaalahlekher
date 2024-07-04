<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Vol extends Model{
    use HasFactory;
    protected $fillable = [
        'numero_vol',
        'ville_depart',
        'ville_arrivee',
        'heure_depart',
        'heure_arrivee',
        'prix',
        'compagnie_id',
    ];

    protected $casts = [
        'heure_depart' => 'datetime',
        'heure_arrivee' => 'datetime',
    ];
    public function compagnie()
    {
        return $this->belongsTo(Compagnie::class, 'compagnie_id');
    }
    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'offer_vol', 'vol_id', 'offer_id');
    }
     // Méthode pour vérifier si le vol a des offres associées
     public function hasOffer()
     {
         return $this->offers()->exists();
     }
}