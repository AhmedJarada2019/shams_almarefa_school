<?php

namespace App\Http\Requests;

use App\Rules\VerifyCodeRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class VerifyMobileRequest extends FormRequest
{
    public function rules(): array
    {
        $user = Auth::user();
        return [
            'code' => [
                'required',
                'numeric',
                new VerifyCodeRule($user),
            ],
        ];
    }
}
