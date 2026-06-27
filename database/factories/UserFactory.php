<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'             => fake()->name(),
            'email'            => fake()->unique()->safeEmail(),
            'password'         => bcrypt('password'),
            'is_active'        => true,
            'remember_token'   => Str::random(10),
            'email_verified_at'=> now(),
        ];
    }
}
