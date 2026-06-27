<?php

namespace App\Rules;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\ValidationRule;

class MatchOldPasswordRule implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /**@var User $user */
        $user = auth()->user();

        if(!Hash::check($value, $user->password)){
            $fail('كلمة المرور الحالية غير صحيحة');
        }
    }
}
