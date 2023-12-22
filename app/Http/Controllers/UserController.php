<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\UseCases\User\CreateUser;
use App\UseCases\User\UserDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            $user = $request->user();

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]);
        }

        return response()->json([
            'error' => 'Invalid credentials'
        ], 401);
    }

    public function me(Request $request)
    {
        return $request->user();
    }

    public function register(UserRequest $request)
    {
        $dto = UserDTO::from($request->validated());

        (new CreateUser())->execute($dto);

        return response()->json(null, 201);
    }
}
