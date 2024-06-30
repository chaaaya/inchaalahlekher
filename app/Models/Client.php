<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;;
class Client extends Authenticatable
{
    use HasFactory, AuthenticableTrait ,  Notifiable;

    protected $table = 'clients';

    protected $fillable = [
        'name', 'date_naissance', 'sexe', 'nationalite', 'numero_identite',
        'expiration_identite', 'email', 'numero_telephone', 'adresse',
        'numero_carte_credit', 'expiration_carte_credit', 'cvv', 'titulaire_carte',
        'subscription_status', // Assurez-vous que cet attribut est inclus si nécessaire
    ];
    

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'client_id');
    }


    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}