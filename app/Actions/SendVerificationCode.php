<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Validation\ValidationException;

class SendVerificationCode
{
    public function __construct(protected SendSmsAction $sendSmsAction,
    ) {
    }

    public function __invoke(User $user)
    {
        if ($user->is_verified or $user->smsHistories()->where('created_at', '>=', now()->subDay())
                ->where('status', '200')->count() >= 3) {

            if ($user->smsHistories()->where('status', '200')->count() >= 3) {
                throw ValidationException::withMessages([
                    'message' => 'لقد تجاوزت عدد المرات المسموح بها',
                ]);
            }
            return;
        }
        $code = $user->verification_code;
        if (!$code) {
            $code = rand(1000, 9999);
            $user->update([
                'verification_code' => $code,
            ]);
        }
        $message = 'كود التفعيل الخاص بك هو: '.$code;
        ($this->sendSmsAction)($user->mobile, $message, $user);
    }
}
