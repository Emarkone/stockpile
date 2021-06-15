<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbound extends Model
{
    use HasFactory;

    public function user() {
        $this->hasOne(User::class);
    }

    public function product() {
        $this->hasOne(Product::class);
    }
}
