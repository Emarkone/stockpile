<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'quantity',
        'buy_price',
        'expiration_date',
        'active',
    ];

    public function inbounds() {
        return $this->hasMany(Inbound::class);
    }

    public function outbounds() {
        return $this->hasMany(Outbound::class);
    }

    public function getStock() {
        return $this->inbounds->sum('quantity') - $this->outbounds->sum('quantity');
    }
}
