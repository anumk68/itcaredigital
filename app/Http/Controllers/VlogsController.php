<?php

// app/Http/Controllers/VlogController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vlog;
use App\Models\BlogCategory;
use Illuminate\Support\Str; 
class VlogsController extends Controller
{
    public function index()
    {
        $vlogs = Vlog::latest()->with('category')->get();
        return view('admin.vlogs.list', compact('vlogs'));
    }

    public function create()
    {
        $vlog_categories = BlogCategory::all();
        return view('admin.vlogs.create', compact('vlog_categories'));
    }

   public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|min:3',
        'slug' => 'required|string|unique:vlogs,slug',
        'category_id' => 'nullable|exists:blog_categories,id',
        'video_url' => 'required|url',
        'short_description' => 'required|string|max:500',
        'description' => 'nullable|string',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string|max:255',
        'meta_keywords' => 'nullable|string|max:255',
        'meta_img' => 'nullable',
    ]);

    $slug = Str::slug($request->slug);

    $metaImage = null;
    if ($request->hasFile('meta_img')) {
        $metaImage = $request->file('meta_img')->store('uploads/vlog/meta', 'public');
    }

    Vlog::create([
        'title' => $request->title,
        'slug' => $slug,
        'category_id' => $request->category_id,
        'video_url' => $request->video_url,
        'short_description' => $request->short_description,
        'description' => $request->description ?? '',
        'meta_title' => $request->meta_title ?? '',
        'meta_description' => $request->meta_description ?? '',
        'meta_keywords' => $request->meta_keywords ?? '',
        'meta_img' => $metaImage,
    ]);

    return redirect()->route('vlog.index')->with('success', 'Vlog created successfully!');
}

    public function edit($id)
    {
        $vlog = Vlog::findOrFail($id);
        $vlog_categories = BlogCategory::all();
        return view('admin.vlogs.edit', compact('vlog', 'vlog_categories'));
    }

    public function update(Request $request, $id)
    {
        $vlog = Vlog::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|min:5',
            'slug' => 'required|string|unique:vlogs,slug,' . $id,
            'category_id' => 'nullable|exists:blog_categories,id',
            'video_url' => 'required|url',
            'short_description' => 'required',
            'description' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'meta_img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('meta_img')) {
            $data['meta_img'] = $request->file('meta_img')->store('uploads/vlogs', 'public');
        }

        $vlog->update($data);
        return redirect()->route('vlog.index')->with('success', 'Vlog updated successfully.');
    }

    public function delete($id)
    {
        $vlog = Vlog::findOrFail($id);
        $vlog->delete();

        return redirect()->route('vlog.index')->with('success', 'Vlog deleted successfully.');
    }
}

