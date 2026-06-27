<?php

namespace App\Http\Requests;

use App\Models\Country;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'mobile'   => [
                'required',
                'string',
                'regex:/^\+966[0-9]{9,10}$/',
                Rule::exists('users', 'mobile'),
            ],
            'password' => [
                'required',
                'string'
            ],
        ];
    }

    protected function prepareForValidation()
    {
        $mobile = str($this->mobile)
            ->prepend(Country::find($this->country_id)?->mobile_code)->value();
        $this->merge([
            'mobile' => $mobile,
        ]);
    }

    public function messages()
    {
        return [
            'mobile.regex' => 'صيغة رقم الهاتف غير صحيحة. مثال: 599123456',
        ];
    }
}
