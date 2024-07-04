<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'title', 'description', 'percentage_discount', 'amount_discount', 'vol_id', 'price', 'image'
    ];

    public function vols()
    {
        return $this->belongsToMany(Vol::class, 'offer_vol', 'offer_id', 'vol_id');    
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
}