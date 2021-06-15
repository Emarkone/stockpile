<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $newProduct = new Product();

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'detail' => ['required', 'string', 'max:255'],
        ])->validate();

        $newProduct->name = $request->name;
        $newProduct->detail = $request->detail;
        $newProduct->active = ($request->active === "on") ? true : false;

        $newProduct->save();

        return redirect('product');

    }
}
