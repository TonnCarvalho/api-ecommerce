<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class TokenController extends Controller
{
    public function store(LoginRequest $request): JsonResponse
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

    public function destroy(Request $request): JsonResponse
    {
        //Remove o token do usuário
        $request->user()->currentAccessToken()->delete();

        return new JsonResponse([
            'success' => true,
            'message' => 'Token revoked successfully'
        ], 200);
    }

        public function destroyAll(Request $request): JsonResponse
    {
        //Remove o token do usuário
        $request->user()->tokens()->delete();

        return new JsonResponse([
            'success' => true,
            'message' => 'All tokens revoked successfully'
        ], 200);
    }
}
