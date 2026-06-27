<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['group', 'key', 'value'];

    public static function get(string $group, string $key, mixed $default = null): mixed
    {
        $settings = Cache::rememberForever("settings.{$group}", function () use ($group) {
            return static::query()
                ->where('group', $group)
                ->pluck('value', 'key')
                ->all();
        });

        return $settings[$key] ?? $default;
    }

    public static function set(string $group, string $key, mixed $value): void
    {
        static::updateOrCreate(
            ['group' => $group, 'key' => $key],
            ['value' => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value]
        );

        Cache::forget("settings.{$group}");
    }

    public static function setMany(string $group, array $pairs): void
    {
        foreach ($pairs as $key => $value) {
            static::set($group, $key, $value);
        }
    }
}
