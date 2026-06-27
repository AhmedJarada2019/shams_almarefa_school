<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'description', 'button_text', 'button_url', 'image', 'is_active',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public static function current(): self
    {
        return static::query()->firstOrCreate([], [
            'title' => 'مدرسة شمس المعرفة',
            'description' => 'ابدأ التعلم معنا',
            'is_active' => true,
        ]);
    }
}
