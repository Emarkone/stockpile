<?php

namespace App\Http\Controllers;

use App\Models\Inbound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InboundController extends Controller
{
    public function store(Request $request)
    {
        Validator::make($request, [
            'product_id' => ['required|exists:product,id'],
            'user_id' => ['required|exists:user, id'],
            'quantity' => ['required', 'numeric'],
            'buy_price' => ['required', 'numeric'],
            'expiration_date' => ['required|date|after:now']
        ])->validate();

        $newInbound = new Inbound();

        $newInbound->product_id = $request->product_id;
        $newInbound->user_id = $request->user_id;
        $newInbound->quantity = $request->quantity;
        $newInbound->buy_price = $request->buy_price;
        $newInbound->expiration_date = $request->expiration_date;

        $newInbound->save();
    }
}
