<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MediaCategoryFactory extends Factory
{
    public function definition(): array
    {
        $names = ['صور الأكاديمية', 'فيديوهات تعليمية', 'ملفات PDF', 'صور الفعاليات',
                  'مقاطع قصيرة', 'شهادات الخريجين', 'لقطات من الكورسات'];
        $name = fake()->unique()->randomElement($names);
        return [
            'name'       => $name,
            'slug'       => Str::slug($name) . '-' . fake()->randomNumber(3),
            'sort_order' => fake()->numberBetween(1, 50),
            'is_active'  => true,
        ];
    }
}
