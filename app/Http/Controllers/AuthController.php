<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Actions\SendVerificationCode;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\CompleteRegisterRequest;

class AuthController extends Controller
{
    public function __construct(protected SendVerificationCode $sendVerificationCode)
    {
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::query()->create($request->validated());
        if (!$user->is_verified) {
            ($this->sendVerificationCode)($user);
        }
        return UserResource::make($user->load('country'))
            ->additional([
                'token' => $user->createToken('user')->plainTextToken,
            ]);
    }

    public function completeRegister(CompleteRegisterRequest $request)
    {
        /** @var User $user */
        $user = $request->user();
        $user->update($request->validated());

        return UserResource::make($user->load(['country']));
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('mobile', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return UserResource::make($user)
                ->additional([
                    'token' => $user->createToken('token')->plainTextToken,
                ]);
        } else {
            return response()->json([
                'message' => __('auth.failed')
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => __('auth.logout')]);
    }

}
