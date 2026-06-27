<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Requests\UpdateUserRequest;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        /** @var User $user */
        $user = $request->user();

        return UserResource::make($user->load(['country']));
    }

    public function update(UpdateUserRequest $request)
    {
        /** @var User $user */
        $user = $request->user();
        $user->update($request->validated());

        return UserResource::make($user->load('country'));
    }

}
