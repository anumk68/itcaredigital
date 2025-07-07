<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Brand;
use App\Models\Service;
class FaqController extends Controller
{


public function getServices($brand_id)
{
    $services = Service::where('brand_id', $brand_id)->pluck('service_name', 'id');
    return response()->json($services);
}

    public function index()
    {
        $faqs = Faq::with(['brand', 'service'])->orderBy('created_at', 'desc')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $brands = Brand::where('status', 'active')->get();
        $services = Service::where('status', 'active')->get();
        return view('admin.faqs.create', compact('brands', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        Faq::create($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        $brands = Brand::where('status', 'active')->get();
        $services = Service::where('status', 'active')->get();
        return view('admin.faqs.edit', compact('faq', 'brands', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
    }

}
