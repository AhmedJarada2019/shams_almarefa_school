<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class MediaCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    protected static function booted(): void
    {
        static::creating(function (self $category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name) ?: Str::random(8);
            }
        });
    }

    public function items(): HasMany
    {
        return $this->hasMany(MediaItem::class);
    }
}
