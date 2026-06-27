<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MediaCategory;
use App\Models\MediaItem;

class MediaController extends Controller
{
    public function index()
    {
        return view('frontend.pages.media.index', [
            'items' => MediaItem::published()->with('category')->orderBy('sort_order')->paginate(24),
            'categories' => MediaCategory::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function category(MediaCategory $mediaCategory)
    {
        abort_unless($mediaCategory->is_active, 404);

        return view('frontend.pages.media.index', [
            'items' => MediaItem::published()->where('media_category_id', $mediaCategory->id)->orderBy('sort_order')->paginate(24),
            'categories' => MediaCategory::where('is_active', true)->orderBy('sort_order')->get(),
            'currentCategory' => $mediaCategory,
        ]);
    }
}
