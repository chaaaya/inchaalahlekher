<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels'; // Nom de la table dans la base de données

    // Champs remplissables dans la table 'hotels'
    protected $fillable = [
        'name',         // Nom de l'hôtel
        'ville',        // Ville où se situe l'hôtel
        'image',        // Chemin vers l'image de l'hôtel (stockée dans le dossier public/images)
        'description',
        'lien',  // Description de l'hôtel
        // Ajoutez d'autres champs si nécessaire en fonction de votre structure de table
    ];
}
