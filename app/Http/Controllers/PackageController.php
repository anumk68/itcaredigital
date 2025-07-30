<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'package_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'short_description' => 'required|string',
            'description' => 'nullable|string',
            'amenities' => 'nullable|string',
            'reviews' => 'nullable|string',
            'subscriptions' => 'nullable|string',
            'status' => 'required|boolean',
            'package_type' => 'nullable',
        ]);

        $data['slug'] = Str::slug($request->package_name);
        $data['subscriptions'] = $request->subscriptions ? explode(',', $request->subscriptions) :   [];

        Package::create($data);

        return redirect()->route('packages.index')->with('success', 'Package created.');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $data = $request->validate([
            'package_name' => 'required|string|max:255',
            'price' => 'required',
            'short_description' => 'required|string',
            'description' => 'nullable|string',
            'amenities' => 'nullable|string',
            'reviews' => 'nullable|string',
            'subscriptions' => 'nullable|string',
            'status' => 'required|boolean',
             'package_type' => 'nullable',
        ]);

        $data['slug'] = Str::slug($request->package_name);
        $data['subscriptions'] = $request->subscriptions ? explode(',', $request->subscriptions) : [];

        $package->update($data);

        return redirect()->route('packages.index')->with('success', 'Package updated.');
    }

    public function destroy($id)
    {
        Package::findOrFail($id)->delete();
        return redirect()->route('packages.index')->with('success', 'Package deleted.');
    }
}
