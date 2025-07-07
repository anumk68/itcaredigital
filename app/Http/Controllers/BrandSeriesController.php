<?php

namespace App\Http\Controllers;

use App\Models\BrandSeries;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandSeriesController extends Controller
{
    public function index() {
        $series = BrandSeries::with('brand')->latest()->get();
        return view('admin.brand_series.list', compact('series'));
    }

    public function create() {
        $brands = Brand::all();
        return view('admin.brand_series.create', compact('brands'));
    }

    public function store(Request $request) {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'series_name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive'
        ]);

        BrandSeries::create($request->all());

        return redirect()->route('brand_series.index')->with('success', 'Brand Series created successfully!');
    }

    public function edit($id) {
        $series = BrandSeries::findOrFail($id);
        $brands = Brand::all();
        return view('admin.brand_series.edit', compact('series', 'brands'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'series_name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive'
        ]);

        $series = BrandSeries::findOrFail($id);
        $series->update($request->all());

        return redirect()->route('brand_series.index')->with('success', 'Brand Series updated successfully!');
    }

    public function destroy($id) {
        $series = BrandSeries::findOrFail($id);
        $series->delete();

        return redirect()->route('brand_series.index')->with('success', 'Brand Series deleted successfully!');
    }
}
