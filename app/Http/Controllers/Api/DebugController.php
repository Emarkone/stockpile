<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inbound;
use App\Models\Product;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    
    public function debug() {

        $product = Product::find(19);

        $debug = $product->inbounds;

        return response()->json($debug);
        
    }

}
