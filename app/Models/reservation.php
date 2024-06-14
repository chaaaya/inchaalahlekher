<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'departure_location',
        'arrival_location',
        'departure_date',
        'nom_passager',
        'email_passager',
        'numero_billet',
        'date_reservation',
        'vol_id', // Assurez-vous que ce champ est toujours inclus si nécessaire
    ];

    public function vol()
    {
        return $this->belongsTo(Vol::class);
    }
}
