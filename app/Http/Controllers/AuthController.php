<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->success([
            'user' => new UserResource($user),
            'token' => $token
        ], 'You Have Register Successfully');
    }

    /**
     * @param LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request)
    {

        if (!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return $this->error(401, 'Credentials not match');
        }

        $user = auth()->user();
        return $this->success([
            'user' => new UserResource($user),
            'token' => auth()
                ->user()
                ->createToken('Login API Token')
                ->plainTextToken
        ], 'You Have Logged in Successfully');
    }

    /**
     * @return mixed
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->success([], 'You Have Successfully Logged out');
    }
}
