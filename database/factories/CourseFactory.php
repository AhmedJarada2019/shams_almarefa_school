<?php

namespace Database\Factories;

use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        $titles = [
            'تعلم PHP من الصفر حتى الاحتراف', 'أساسيات تصميم واجهات المستخدم',
            'مقدمة إلى تعلم الآلة', 'إدارة المشاريع الاحترافية',
            'التسويق عبر وسائل التواصل الاجتماعي', 'قواعد البيانات SQL المتقدمة',
            'تطوير تطبيقات الموبايل', 'أمن الشبكات والأنظمة',
            'Python للمبتدئين', 'إنشاء متجر إلكتروني متكامل',
            'تصميم الشعارات الاحترافية', 'اللغة الإنجليزية للأعمال',
            'تحليل البيانات مع Excel', 'مهارات التفاوض والإقناع',
            'برمجة JavaScript الحديثة', 'Docker وحاويات التطبيقات',
        ];
        $title = fake()->unique()->randomElement($titles);
        $status = fake()->randomElement(['published', 'published', 'published', 'draft']);
        return [
            'course_category_id' => CourseCategory::inRandomOrder()->first()?->id,
            'title'              => $title,
            'slug'               => Str::slug($title) . '-' . fake()->randomNumber(3),
            'excerpt'            => fake()->sentence(15),
            'description'        => '<p>' . implode('</p><p>', fake()->paragraphs(4)) . '</p>',
            'featured_image'     => null,
            'duration'           => fake()->randomElement(['4 أسابيع', '8 أسابيع', '3 أشهر', '6 أشهر', '20 ساعة', '40 ساعة']),
            'is_featured'        => fake()->boolean(30),
            'sort_order'         => fake()->numberBetween(1, 100),
            'status'             => $status,
            'published_at'       => $status === 'published' ? fake()->dateTimeBetween('-1 year', 'now') : null,
            'meta_title'         => $title,
            'meta_description'   => fake()->sentence(15),
        ];
    }
}
