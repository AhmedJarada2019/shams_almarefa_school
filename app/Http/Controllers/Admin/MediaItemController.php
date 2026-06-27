<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaCategory;
use App\Models\MediaItem;
use App\Support\UploadsFile;
use Illuminate\Http\Request;

class MediaItemController extends Controller
{
    use UploadsFile;

    public function index()
    {
        return view('admin.media-items.index', [
            'items' => MediaItem::with('category')->orderBy('sort_order')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.media-items.form', [
            'item' => new MediaItem,
            'categories' => MediaCategory::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['file_path'] = $this->storeUpload($request->file('file'), 'media') ?? '';
        $data['thumbnail_path'] = $this->storeUpload($request->file('thumbnail'), 'media/thumbs');
        MediaItem::create($data);

        return redirect()->route('admin.media-items.index')->with('success', 'تم الإضافة.');
    }

    public function edit(MediaItem $mediaItem)
    {
        return view('admin.media-items.form', [
            'item' => $mediaItem,
            'categories' => MediaCategory::orderBy('sort_order')->get(),
        ]);
    }

    public function update(Request $request, MediaItem $mediaItem)
    {
        $data = $this->validated($request);
        $file = $this->storeUpload($request->file('file'), 'media', $mediaItem->file_path);
        if ($file) {
            $data['file_path'] = $file;
        }
        $thumb = $this->storeUpload($request->file('thumbnail'), 'media/thumbs', $mediaItem->thumbnail_path);
        if ($thumb) {
            $data['thumbnail_path'] = $thumb;
        }
        $mediaItem->update($data);

        return redirect()->route('admin.media-items.index')->with('success', 'تم التحديث.');
    }

    public function destroy(MediaItem $mediaItem)
    {
        $mediaItem->delete();

        return back()->with('success', 'تم الحذف.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'media_category_id' => ['nullable', 'exists:media_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'in:image,video'],
            'file' => [$request->isMethod('post') ? 'required' : 'nullable', 'file', 'max:20480'],
            'thumbnail' => ['nullable', 'image', 'max:5120'],
            'external_url' => ['nullable', 'url', 'max:500'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        unset($data['file'], $data['thumbnail']);

        return $data;
    }
}
