<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            return response()->json([
                'success'=>true,
                'token' => $token,
                'message'=>'usuario  a creado sesion con exito',
                'data' => $user
                ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Credenciales invalidas'
                ], 401);
        }
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email'],
            'password' => ['required', 'string', 'min:8']
        ],
            [
                'email.unique'=>'el correo del usuario que deseas ingresar ya se encuentra registrado'
    
        ]);
        if ($validator->fails()) {
        return response()->json([
            'message' => $validator->errors()->first()
        ], 422);
    }
    $datosvalidatos = $validator->validated();
        $user = \App\Models\User::create([
            'name' => $datosvalidatos['name'],
            'email' => $datosvalidatos['email'],
            'password' => bcrypt($datosvalidatos['password'])
        ]);
        $token = $user->createToken('token')->plainTextToken;
        return response()->json([
            'success'=>true,
            'token' => $token, 
            'message' => 'Usuario creado',
            'data'=>$user
            ], 201);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'success' => true,
            'message' => 'Cierre de sesion exitosa'
        ],200);
    }
}

