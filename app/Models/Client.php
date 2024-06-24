<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Client extends Model implements AuthenticatableContract
{
    use Authenticatable;
    
    protected $guarded = [];
    
    protected $table = 'clients'; // Nom de votre table clients si différent de la convention
    
    protected $fillable = [
        'name', 'email', 'password', 'numero_telephone', 'status', 'subscription'
        // Ajoutez d'autres attributs selon votre structure de base de données
    ];

    // Relation avec les réservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'client_id'); // Assurez-vous que le nom de la clé étrangère est correct
    }
    
    // Méthode nécessaire pour l'interface Authenticatable
    public function getAuthIdentifierName()
    {
        return 'id'; // Le nom de la colonne utilisée comme identifiant dans votre table 'clients'
    }
}
