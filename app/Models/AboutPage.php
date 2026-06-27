<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'title', 'content', 'image', 'meta_title', 'meta_description', 'is_active',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public static function current(): self
    {
        return static::query()->firstOrCreate([], [
            'title' => 'من نحن',
            'content' => '<p>محتوى من نحن</p>',
            'is_active' => true,
        ]);
    }
}
