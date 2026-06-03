<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return $this->respondWithMutation(
            message: 'Account created successfully.',
            data:    [
                'user'  => new UserResource($user),
                'token' => $token,
            ],
            code: 201,
        );
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return $this->respondError(
                message: 'The provided credentials are incorrect.',
                code: 401,
            );
        }

        // Revoke old tokens — keep it clean
        $user->tokens()->delete();

        $token = $user->createToken('api-token')->plainTextToken;

        return $this->respondWithMutation(
            message: 'Logged in successfully.',
            data:    [
                'user'  => new UserResource($user),
                'token' => $token,
            ],
        );
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return $this->respondMessage('Logged out successfully.');
    }

    public function user(Request $request): JsonResponse
    {
        return $this->respondWithResource(new UserResource($request->user()));
    }
}
