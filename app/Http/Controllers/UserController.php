<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone_number' => ['required','string'],
            'mailing_address' => ['required', 'string', 'max:500'],
            'user_type' => ['required', 'in:admin,client,supplier']
        ])->validate();

        $newUser = new User();

        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->phone_number = $request->phone_number;
        $newUser->mailing_address = $request->mailing_address;
        $newUser->user_type = $request->user_type;
        
        $newUser->save();

        return redirect('inbound');
    }
}
