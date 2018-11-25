<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('enezaapp')->accessToken;

        return repsonse()->json(['token' => $token], 200);

    }

    public function login(Request $request) 
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(auth()->attempt($credentials)){
            $token = auth()->user()->createToken('enezaapp')->accessToken;
            return response()->json(['token' => $token], 200);
        }else{
            return response()->json(['error'=> 'Unauthorized'],401);
        }
    }
}