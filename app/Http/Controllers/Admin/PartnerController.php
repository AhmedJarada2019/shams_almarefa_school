<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Support\UploadsFile;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    use UploadsFile;

    public function index()
    {
        return view('admin.partners.index', [
            'partners' => Partner::orderBy('sort_order')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.partners.form', ['partner' => new Partner]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['logo'] = $this->storeUpload($request->file('logo'), 'partners') ?? '';
        Partner::create($data);

        return redirect()->route('admin.partners.index')->with('success', 'تم الإضافة.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.form', ['partner' => $partner]);
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $this->validated($request);
        $logo = $this->storeUpload($request->file('logo'), 'partners', $partner->logo);
        if ($logo) {
            $data['logo'] = $logo;
        }
        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'تم التحديث.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return back()->with('success', 'تم الحذف.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => [$request->isMethod('post') ? 'required' : 'nullable', 'image', 'max:5120'],
            'website_url' => ['nullable', 'url', 'max:500'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        unset($data['logo']);

        return $data;
    }
}
