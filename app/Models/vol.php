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
        'compagnie',
    ];

    protected $casts = [
        'heure_depart' => 'datetime',
        'heure_arrivee' => 'datetime',
    ];
}
