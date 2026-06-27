<?php

if (! function_exists('media_url')) {
    function media_url(?string $path, ?string $default = null): string
    {
        if (! $path) {
            return asset($default ?? 'frontend/imgs/logo.svg');
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return asset('storage/'.$path);
    }
}
