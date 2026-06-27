<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Country;
use App\Rules\VerifyCodeRule;
use Illuminate\Foundation\Http\FormRequest;

class SendOtpRequest extends FormRequest
{

    public function rules()
    {
        /** @var User $user */
        $user = User::query()->where('mobile', $this->mobile)->first();

        return [
            'code'   => [
                'required',
                'numeric',
                new VerifyCodeRule($user),
            ],
            'mobile' => [
                'required',
                'string',
                'exists:users,mobile',
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
