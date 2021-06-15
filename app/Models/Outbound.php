<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outbound extends Model
{
    use HasFactory;

    public function user() {
        $this->hasOne(User::class, 'user_id');
    }

    public function product() {
        $this->hasOne(Product::class, 'product_id');
    }
}
