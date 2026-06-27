<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'current_password' => ['required', new MatchOldPasswordRule()],

            'new_password' => [
                'required',
                'different:current_password',
                'string'
            ],

            'password_confirmation' => [
                'required',
                'same:new_password',
                'string'
            ]
        ];
    }
}
