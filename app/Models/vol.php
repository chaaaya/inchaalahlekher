<?php // app/Models/Vol.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_vol', 'heure_depart', 'heure_arrivee'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
