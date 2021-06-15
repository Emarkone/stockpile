<?php

namespace App\Http\Controllers;

use App\Models\Outbound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OutboundController extends Controller
{
    public function store(Request $request)
    {
        Validator::make($request, [
            'product_id' => ['required|exists:product,id'],
            'user_id' => ['required|exists:user, id'],
            'quantity' => ['required', 'numeric'],
            'sell_price' => ['required', 'numeric']
        ])->validate();

        $newOutbound = new Outbound();

        $newOutbound->product_id = $request->product_id;
        $newOutbound->user_id = $request->user_id;
        $newOutbound->quantity = $request->quantity;
        $newOutbound->sell_price = $request->buy_price;

        $newOutbound->save();
    }
}
