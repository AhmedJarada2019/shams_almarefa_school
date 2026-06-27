<?php

namespace App\Http\Requests;

use App\Models\Country;
use App\Rules\EnsureUserUnique;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function rules(): array
    {
        $country = Country::find($this->country_id);

        return [
            'mobile'     => [
                'required',
                new EnsureUserUnique($country),
                'numeric',
                'regex:/^[0-9]{9,10}$/'
            ],
            'password'   => [
                'required',
                Password::defaults(),
            ],
            'country_id' => [
                'nullable',
                'integer',
                'exists:countries,id',
            ],
        ];
    }

    public function validated($key = null, $default = null)
    {
        $data = parent::validated($key, $default);
        if (isset($data['mobile'])) {
            $data['mobile'] = str($data['mobile'])
                ->prepend(Country::find($this->country_id)?->mobile_code)->value();
        }

        return $data;
    }

    public function messages()
    {
        return [
            'mobile.regex' => 'صيغة رقم الهاتف غير صحيحة. مثال: 599123456',
        ];
    }
}
