<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $categories = BlogCategory::orderBy('category_name', 'asc');

        if ($request->has('search')){
            $sort_search = $request->search;
            $categories = $categories->where('category_name', 'like', '%'.$sort_search.'%');
        }

        $categories = $categories->paginate(15);
        return view('admin.blog.category.index', compact('categories', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:255',
        ]);

        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->category_name));

        $category = new BlogCategory;

        $category->category_name = $request->category_name;
        $category->slug = strtolower($slug);

        $category->save();

        return redirect()->route('blog.category')->with('success', 'Blog category has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cateogry = BlogCategory::find($id);
        $all_categories = BlogCategory::all();

        return view('admin.blog.category.edit',  compact('cateogry','all_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'category_name' => 'required|max:255',
        ]);

        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));

        $category = BlogCategory::find($id);

        $category->category_name = $request->category_name;
        $category->slug = strtolower($slug);

        $category->save();

        return redirect()->route('blog.category')->with('success', 'Blog category has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        BlogCategory::find($id)->delete();
        return redirect()->route('blog.category')->with('success', 'Blog category has been deleted successfully');
    }
}
