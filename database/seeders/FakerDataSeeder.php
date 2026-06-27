<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\MediaCategory;
use App\Models\MediaItem;
use App\Models\Partner;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class FakerDataSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🌱 Seeding fake data...');

        // ── Users ──────────────────────────────────────────────
        $this->command->info('  → Creating users...');
        User::factory(5)->create();

        // ── Course Categories & Courses ────────────────────────
        $this->command->info('  → Creating course categories & courses...');
        CourseCategory::factory(6)->create();
        Course::factory(16)->create();

        // ── Blog Categories & Posts ────────────────────────────
        $this->command->info('  → Creating blog categories & posts...');
        BlogCategory::factory(5)->create();
        BlogPost::factory(12)->create();

        // ── Media ──────────────────────────────────────────────
        $this->command->info('  → Creating media categories & items...');
        MediaCategory::factory(4)->create();
        MediaItem::factory(20)->create();

        // ── Partners ───────────────────────────────────────────
        $this->command->info('  → Creating partners...');
        Partner::factory(8)->create();

        // ── Contact Messages ───────────────────────────────────
        $this->command->info('  → Creating contact messages...');
        ContactMessage::factory(15)->create();

        // ── Site Settings ──────────────────────────────────────
        $this->command->info('  → Setting up site settings...');
        Setting::setMany('site', [
            'name'        => 'مدرسة شمس المعرفة',
            'tagline'     => 'التعلم من أجل المستقبل',
            'footer_text' => 'مدرسة شمس المعرفة — نقدم أفضل الدورات التدريبية لبناء مستقبلك المهني.',
        ]);

        Setting::setMany('seo', [
            'meta_title'       => 'مدرسة شمس المعرفة | دورات تدريبية متخصصة',
            'meta_description' => 'اكتسب مهارات جديدة مع مدرسة شمس المعرفة — دورات تدريبية احترافية في البرمجة والتصميم وإدارة الأعمال.',
        ]);

        Setting::setMany('social', [
            'facebook'  => 'https://facebook.com/academy',
            'twitter'   => 'https://twitter.com/academy',
            'instagram' => 'https://instagram.com/academy',
            'youtube'   => 'https://youtube.com/@academy',
            'whatsapp'  => '+966500000000',
        ]);

        Setting::setMany('contact', [
            'phone'         => '+966 50 000 0000',
            'email'         => 'info@academy.local',
            'address'       => 'الرياض، المملكة العربية السعودية',
            'map_embed'     => '',
            'working_hours' => 'الأحد – الخميس: 9 ص – 5 م',
        ]);

        Setting::setMany('blog', [
            'author_name'  => 'فريق مدرسة شمس المعرفة',
            'author_title' => 'فريق المحتوى التعليمي',
            'author_bio'   => 'فريق متخصص في إنتاج محتوى تعليمي عالي الجودة يساعد المتعلمين على تطوير مهاراتهم.',
            'author_image' => '',
        ]);

        $this->command->info('✅ All fake data seeded successfully!');
        $this->command->info('');
        $this->command->info('  Admin login:  admin@admin.com / admin@admin.com');
    }
}
