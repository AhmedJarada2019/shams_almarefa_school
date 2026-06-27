<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Actions\SendVerificationCode;
use App\Http\Requests\SendOtpRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\ChangePasswordRequest;

class PasswordController extends Controller
{
    public function __construct(protected SendVerificationCode $sendVerificationCode)
    {
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $mobile = $request->input('mobile');

        /** @var User $user */
        $user = User::query()->where('mobile', $mobile)->first();
        ($this->sendVerificationCode)($user);

        return response()->json([
            'mobile'  => $user->mobile,
            'message' => __('auth.otp'),
        ]);
    }

    public function verify(SendOtpRequest $request)
    {
        $mobile = $request->input('mobile');

        /**@var  User $user */
        $user = User::query()->where('mobile', $mobile)->first();

        return ['token' => $user->createToken('user')->plainTextToken];
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $new_password = Hash::make($request->password);

        /** @var User $user */
        $user = $request->user();
        $user->update([
            'password' => $new_password
        ]);

        return response()->json([
            'message' => __('passwords.reset'),
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $request->user()->update([
            'password' => bcrypt($request->new_password)
        ]);

        return response()->json([
            'message' => __('passwords.change'),
        ]);
    }
}
