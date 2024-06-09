<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Aeroport extends Model
{
    use HasFactory;
    protected $table = 'aeroports';

    // Si vous avez des colonnes fillable (modifiables en masse), définissez-les ici
    protected $fillable = ['nom', 'code']; // Ajoutez les colonnes nécessaires ici
        // Ajoutez d'autres colonnes si nécessaire
    

    // Si vous avez des relations avec d'autres modèles, définissez-les ici
}
