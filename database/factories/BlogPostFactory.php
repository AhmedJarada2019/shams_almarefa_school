<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogPostFactory extends Factory
{
    public function definition(): array
    {
        $titles = [
            'كيف تبدأ تعلم البرمجة في عام 2024', '10 نصائح لتحسين إنتاجيتك',
            'أفضل مصادر تعلم اللغة الإنجليزية مجاناً', 'مستقبل الذكاء الاصطناعي في التعليم',
            'كيف تحصل على أول وظيفة في مجال التقنية', 'أهمية التعلم المستمر في عصر التغيير',
            'قصة نجاح: من مبتدئ إلى محترف في 6 أشهر', 'أفضل 5 دورات تدريبية مجانية عبر الإنترنت',
            'كيف تبني شبكة علاقات مهنية قوية', 'مهارات المستقبل التي يجب أن تتعلمها الآن',
            'دليل المبتدئين لتعلم تصميم الجرافيك', 'كيف تحول شغفك إلى مصدر دخل',
        ];
        $title = fake()->unique()->randomElement($titles);
        $status = fake()->randomElement(['published', 'published', 'published', 'draft']);
        return [
            'blog_category_id' => BlogCategory::inRandomOrder()->first()?->id,
            'user_id'          => User::inRandomOrder()->first()?->id,
            'title'            => $title,
            'slug'             => Str::slug($title) . '-' . fake()->randomNumber(3),
            'excerpt'          => fake()->sentence(20),
            'content'          => '<p>' . implode('</p><p>', fake()->paragraphs(6)) . '</p>',
            'featured_image'   => null,
            'status'           => $status,
            'published_at'     => $status === 'published' ? fake()->dateTimeBetween('-1 year', 'now') : null,
            'views_count'      => fake()->numberBetween(0, 5000),
            'meta_title'       => $title,
            'meta_description' => fake()->sentence(15),
        ];
    }
}
