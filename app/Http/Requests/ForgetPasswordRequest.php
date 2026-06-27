<?php

namespace App\Http\Requests;

use App\Models\Country;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'mobile'     => [
                'required',
                'string',
                Rule::exists('users', 'mobile'),
            ],
            'country_id' => [
                'required',
                'integer',
                'exists:countries,id',
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
}
