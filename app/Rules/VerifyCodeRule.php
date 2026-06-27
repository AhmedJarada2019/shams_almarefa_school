<?php

namespace App\Rules;

use Closure;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Contracts\Validation\ValidationRule;

class VerifyCodeRule implements ValidationRule
{
    public function __construct(protected ?User $user)
    {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Setting::valueOf(Setting::SKIP_SMS) && $this->user->verification_code != $value) {
            $fail('الكود المدخل غير صحيح');
        }
    }
}
