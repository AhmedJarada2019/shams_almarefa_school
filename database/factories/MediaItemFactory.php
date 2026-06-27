<?php

namespace Database\Factories;

use App\Models\MediaCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaItemFactory extends Factory
{
    public function definition(): array
    {
        $type = fake()->randomElement(['image', 'image', 'image', 'video']);
        return [
            'media_category_id' => MediaCategory::inRandomOrder()->first()?->id,
            'title'             => fake()->sentence(4),
            'description'       => fake()->sentence(10),
            'type'              => $type,
            'file_path'         => $type === 'video'
                                    ? 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'
                                    : 'https://picsum.photos/seed/' . fake()->randomNumber(5) . '/800/600',
            'thumbnail_path'    => null,
            'external_url'      => null,
            'alt_text'          => fake()->sentence(3),
            'sort_order'        => fake()->numberBetween(1, 100),
            'is_active'         => true,
            'published_at'      => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
