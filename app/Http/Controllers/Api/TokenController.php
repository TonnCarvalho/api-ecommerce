<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function store(LoginRequest $request)
    {
        //Valida dados do login
        $credentials = $request->validated();

        //Fail
        if (!Auth::attempt($credentials)) {
            return new JsonResponse([
                "success" => false,
                "message" => "Invalid credentials"
            ], 401);
        }
        //Cria o token e salva o 'plainTextToken' no DB.
        $token = Auth::user()->createToken('auth', expiresAt: now()->addMonth())->plainTextToken;

        //Success
        return new JsonResponse([
            'success' => true,
            "message" => "Login successful",
            "token" => $token
        ], 201);
    }
}
