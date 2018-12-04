<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate($request, [
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('enezaapp')->accessToken;

        return response()->json(['token' => $token], 200);

    }

    public function login(Request $request)
    {
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('enezaapp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
