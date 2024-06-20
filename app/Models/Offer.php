<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'title', 'description', 'percentage_discount', 'amount_discount', 'vol_id', 'price', 'image'
    ];

    public function vol()
    {
        return $this->belongsTo(Vol::class, 'vol_id');
    }
}
