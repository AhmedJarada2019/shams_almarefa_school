<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class UserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'                   => $this->id,
            'mobile'               => $this->mobile,
            'first_name'           => $this->first_name,
            'last_name'            => $this->last_name,
            'email'                => $this->email,
            'is_verified'          => $this->is_verified,
            'password'             => $this->password,
            'country'              => $this->whenLoaded('country', function () {
                return new CountryResource($this->country);
            }),
            'is_profile_completed' => $this->is_profile_completed,
            'national_identity'    => $this->national_identity,
            'birthday'             => $this->birthday ? Carbon::make($this->birthday)->format('Y-m-d') : null,
        ];
    }
}
