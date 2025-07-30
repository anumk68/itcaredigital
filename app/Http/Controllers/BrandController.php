<?php
namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.list', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name'       => 'nullable|string|max:255',
            'icon_image'       => 'nullable',
            'slug'             => 'nullable|string|max:255',
            'description'      => 'nullable|string',
            'banner_image'     => 'nullable',
            'status'           => 'nullable|in:active,inactive',
            'seo_content'      => 'nullable|string',
            'additional_image' => 'nullable',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keyword'     => 'nullable|string|max:255',
        ]);

        // handle image uploads
        if ($request->hasFile('icon_image')) {
            $validated['icon_image'] = $request->file('icon_image')->store('brands/icons', 'public');
        }

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('brands/banners', 'public');
        }

        if ($request->hasFile('additional_image')) {
            $validated['additional_image'] = $request->file('additional_image')->store('brands/additional', 'public');
        }

        Brand::create($validated);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully!');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'brand_name'       => 'nullable|string|max:255',
            'icon_image'       => 'nullable',
            'slug'             => 'nullable|string|max:255',
            'description'      => 'nullable|string',
            'banner_image'     => 'nullable',
            'status'           => 'nullable|in:active,inactive',
            'seo_content'      => 'nullable|string',
            'additional_image' => 'nullable',
             'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keyword'     => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('icon_image')) {
            $validated['icon_image'] = $request->file('icon_image')->store('brands/icons', 'public');
        }

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('brands/banners', 'public');
        }

        if ($request->hasFile('additional_image')) {
            $validated['additional_image'] = $request->file('additional_image')->store('brands/additional', 'public');
        }

        $brand->update($validated);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully!');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully!');
    }
}
