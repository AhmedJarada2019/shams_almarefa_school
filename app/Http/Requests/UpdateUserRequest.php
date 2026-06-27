<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'first_name'        => [
                'required',
                'string',
                'regex:/^[\p{L}\s]+$/u'
            ],
            'last_name'         => [
                'required',
                'string',
                'regex:/^[\p{L}\s]+$/u'
            ],
            'email'             => [
                'required',
                'email',
                'unique:users,email,' . Auth::id(),
            ],
            'national_identity' => [
                'required',
                'regex:/\d{9}/',
                'string',
            ],
            'birthday'          => [
                'required',
                'string',
            ],
        ];
    }

    protected function prepareForValidation()
    {
        $this->mergeIfMissing(['country_id' => Auth::user()?->country_id]);
    }

    public function messages()
    {
        return [
            'first_name.regex' => 'يرجى إدخال الاسم بالحروف الأبجدية',
            'last_name.regex'  => 'يرجى إدخال الاسم بالحروف الأبجدية'
        ];
    }
}

