<?php

namespace App\Rules;

use Closure;
use App\Models\User;
use App\Models\Country;
use Illuminate\Contracts\Validation\ValidationRule;

class EnsureUserUnique implements ValidationRule
{
    public function __construct(protected ?Country $country, protected $model = User::class)
    {
        //
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $model = $this->model;

       $result =  $model::query()->where('mobile', $this->getFullMobile($value))->doesntExist();

       if (!$result){
           $fail('رقم الهاتف موجود مسبقاً!');
       }
    }

    private function getFullMobile($mobile)
    {
        return str($mobile)->prepend($this->country?->mobile_code)->value();
    }
}
