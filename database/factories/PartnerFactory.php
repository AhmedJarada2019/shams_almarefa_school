<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    public function definition(): array
    {
        $partners = [
            'شركة التقنية المتقدمة', 'مؤسسة التعليم الرقمي', 'مجموعة الابتكار',
            'شركة البرمجيات الذكية', 'مركز التطوير المهني', 'معهد الكفاءات',
            'شركة الحلول التقنية', 'مؤسسة الريادة والإبداع',
        ];
        return [
            'name'        => fake()->unique()->randomElement($partners),
            'logo'        => 'https://ui-avatars.com/api/?name=' . urlencode(fake()->company()) . '&size=200&background=3699FF&color=fff',
            'website_url' => fake()->url(),
            'description' => fake()->sentence(8),
            'sort_order'  => fake()->numberBetween(1, 50),
            'is_active'   => true,
        ];
    }
}
