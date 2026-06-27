<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use App\Models\Hero;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AcademyCmsSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@academy.local'],
            [
                'name' => 'مدير النظام',
                'password' => Hash::make('password'),
                'is_active' => true,
            ]
        );

        Hero::current()->update([
            'title' => 'ابدأ التعلم مع مدرسة شمس المعرفة',
            'subtitle' => null,
            'description' => 'قم ببناء مهاراتك العملية من خلال برامج تدريبية متطورة.',
            'button_text' => 'تصفح الدورات',
            'button_url' => '/courses',
            'is_active' => true,
        ]);

        AboutPage::current()->update([
            'title' => 'من نحن',
            'content' => '<p>مدرسة شمس المعرفة تقدم دورات تدريبية مميزة في مختلف المجالات العلمية.</p>',
            'is_active' => true,
        ]);

        Setting::setMany('site', [
            'name' => 'مدرسة شمس المعرفة',
            'tagline' => 'التعلم من أجل المستقبل',
            'footer_text' => 'مدرسة شمس المعرفة تقدم دورات تدريبية مميزة في مختلف المجالات العلمية.',
        ]);

        Setting::setMany('contact', [
            'phone' => '',
            'email' => 'info@academy.local',
            'address' => '',
            'map_embed' => '',
            'working_hours' => '',
        ]);

        Setting::setMany('blog', [
            'author_name' => 'فريق الأكاديمية',
            'author_title' => 'كاتب',
            'author_bio' => 'نشر محتوى تعليمي عالي الجودة.',
            'author_image' => '',
        ]);
    }
}
