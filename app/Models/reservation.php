<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

  
    protected $fillable = [
        'vol_id',
        'client_id',
        'email',
        'telephone',
        'sexe',
        'nationalite',
        'num_identite',
        'date_expiration_identite',
        'pays_delivrance_identite',
        'tarif',
        'type_bagage',
        'nombre_bagages',
        'poids_bagage',
        'longueur_bagage',
        'largeur_bagage',
        'hauteur_bagage',
        'contenu_bagage',
        'equipement_sportif',
        'instrument_musique',
        'num_carte',
        'date_expiration_carte',
        'cvv',
        'nom_titulaire_carte',
        'status',
    ];
public function vol()
{
    return $this->belongsTo(Vol::class, 'vol_id');
}
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    // Dans app/Models/Reservation.php


}
