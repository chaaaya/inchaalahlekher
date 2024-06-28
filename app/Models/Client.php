<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Client extends Model implements AuthenticatableContract
{
    use Authenticatable, HasFactory;

    protected $guarded = [];

    protected $table = 'clients';

    protected $fillable = [
        'nom', 'date_naissance', 'sexe', 'nationalite', 'numero_identite',
        'expiration_identite', 'email', 'numero_telephone', 'numero_carte_credit',
        'expiration_carte_credit', 'cvv', 'titulaire_carte'
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
