<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Actions\SendVerificationCode;
use App\Http\Requests\VerifyMobileRequest;

class OTPController extends Controller
{
    public function __construct(protected SendVerificationCode $sendVerificationCode)
    {
    }

    public function verify(VerifyMobileRequest $request)
    {
        /**@var  User $user */
        $user = $request->user();

        $user->update([
            'is_verified' => true,
        ]);

        return UserResource::make($user->load('country'));
    }

    public function resend(Request $request)
    {
        /**@var User $user */
        $user = $request->user();

        if (!$user->is_verified) {
            ($this->sendVerificationCode)($user);
        }

        return response()->json(['message' => __('auth.otp')]);
    }
}
