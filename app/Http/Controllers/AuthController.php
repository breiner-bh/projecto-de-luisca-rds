<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     public function login(Request $request)
    {
        $credenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credenciales)) {
            /**@var \App\Models\User $user */
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['message' => 'Credenciales invalidas'], 401);
        }
    }
    public function register(Request $request)
    {
        $datos = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);
        $user = \App\Models\User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => bcrypt($datos['password'])
        ]);
        $token = $user->createToken('token')->plainTextToken;
        return response()->json(['token' => $token, 'message' => 'Usuario creado con éxito'], 201);
    }
}
