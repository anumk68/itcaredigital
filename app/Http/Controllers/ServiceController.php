<?php

// app/Http/Controllers/ServiceController.php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller {
    public function index() {
        $services = Service::with('brand')->orderBy('id', 'desc')->get();
        return view('admin.services.list', compact('services'));
    }

    public function create() {
        $brands = Brand::where('status', 'active')->get();
        return view('admin.services.create', compact('brands'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'slug' => 'nullable|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp',
            'description' => 'nullable|string',
            'status' => 'nullable|in:active,inactive'
        ]);

        // Handle file uploads
        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('services/icons', 'public');
        }

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('services/banners', 'public');
        }

        $validated['status'] = $validated['status'] ?? 'active';
        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['service_name']);

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service) {
        $brands = Brand::where('status', 'active')->get();
        return view('admin.services.edit', compact('service', 'brands'));
    }

    public function update(Request $request, Service $service) {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'slug' => 'nullable|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp',
            'description' => 'nullable|string',
            'status' => 'nullable|in:active,inactive'
        ]);

        if ($request->hasFile('icon')) {
            if ($service->icon) {
                Storage::disk('public')->delete($service->icon);
            }
            $validated['icon'] = $request->file('icon')->store('services/icons', 'public');
        }

        if ($request->hasFile('banner_image')) {
            if ($service->banner_image) {
                Storage::disk('public')->delete($service->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')->store('services/banners', 'public');
        }

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['service_name']);
        $validated['status'] = $validated['status'] ?? 'active';

        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service) {
        if ($service->icon) {
            Storage::disk('public')->delete($service->icon);
        }
        if ($service->banner_image) {
            Storage::disk('public')->delete($service->banner_image);
        }
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}

