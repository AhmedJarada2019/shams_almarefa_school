<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadsFile
{
    protected function storeUpload(?UploadedFile $file, string $directory, ?string $oldPath = null): ?string
    {
        if (! $file) {
            return $oldPath;
        }

        if ($oldPath && ! Str::startsWith($oldPath, ['http://', 'https://'])) {
            Storage::disk('public')->delete($oldPath);
        }

        return $file->store($directory, 'public');
    }
}
