<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompleteRegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name'        => [
                'required',
                'string',
            ],
            'last_name'         => [
                'required',
                'string',
            ],
            'email'             => [
                'required',
                'email',
            ],
            'national_identity' => [
                'required',
                'regex:/\d{9}/',
                'numeric',
            ],
            'birthday'          => [
                'required',
                'string',
            ],
        ];
    }


    public function messages()
    {
        return [
            'national_identity.regex' => 'صيغة الهوية الوطنية/الإقامة غير صحيحة. مثال: 123456789',
        ];
    }
}
