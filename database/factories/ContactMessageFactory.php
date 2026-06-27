<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactMessageFactory extends Factory
{
    public function definition(): array
    {
        $subjects = ['استفسار عن دورة', 'طلب معلومات', 'شراكة مقترحة', 'مشكلة تقنية', 'اقتراح', null];
        return [
            'name'       => fake()->name(),
            'email'      => fake()->safeEmail(),
            'phone'      => fake()->phoneNumber(),
            'subject'    => fake()->randomElement($subjects),
            'message'    => fake()->paragraphs(2, true),
            'ip_address' => fake()->ipv4(),
            'is_read'    => fake()->boolean(40),
            'read_at'    => null,
            'read_by'    => null,
        ];
    }
}
