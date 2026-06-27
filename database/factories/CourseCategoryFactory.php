<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseCategoryFactory extends Factory
{
    public function definition(): array
    {
        $names = ['البرمجة والتطوير', 'تصميم الجرافيك', 'الذكاء الاصطناعي', 'إدارة الأعمال',
                  'التسويق الرقمي', 'اللغة الإنجليزية', 'الأمن السيبراني', 'تطوير الويب',
                  'علم البيانات', 'ريادة الأعمال'];
        $name = fake()->unique()->randomElement($names);
        return [
            'name'        => $name,
            'slug'        => Str::slug($name) . '-' . fake()->randomNumber(3),
            'description' => fake()->sentence(10),
            'sort_order'  => fake()->numberBetween(1, 100),
            'is_active'   => true,
        ];
    }
}
