<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_passager', 'email_passager', 'numero_billet', 'date_reservation', 'vol_id'
    ];

    public function vol()
    {
        return $this->belongsTo(Vol::class);
    }
}
