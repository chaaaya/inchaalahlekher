<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

  
    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'sexe',
        'nationalite',
        'num_identite',
        'date_expiration_identite',
        'pays_delivrance_identite',
        'date_depart',
        'date_retour',
        'email',
        'telephone',
        'num_carte',
        'date_expiration_carte',
        'cvv',
        'nom_titulaire_carte',
        'ville_depart',
        'ville_arrivee',
        'client_id',
        'vol_id', // Ajoutez cette ligne
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
