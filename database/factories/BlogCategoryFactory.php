<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogCategoryFactory extends Factory
{
    public function definition(): array
    {
        $names = ['أخبار التقنية', 'نصائح التعلم', 'قصص نجاح', 'مقالات تعليمية',
                  'ريادة الأعمال', 'مهارات حياتية', 'التطوير المهني', 'عالم البرمجة'];
        $name = fake()->unique()->randomElement($names);
        return [
            'name'        => $name,
            'slug'        => Str::slug($name) . '-' . fake()->randomNumber(3),
            'description' => fake()->sentence(10),
            'sort_order'  => fake()->numberBetween(1, 50),
            'is_active'   => true,
        ];
    }
}
