<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Code;
use App\Models\Setting;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index(Request $request)
    {
        $code        = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $sort_search = null;
        $blogs       = Blog::orderBy('created_at', 'desc');

        if ($request->search != null) {
            $blogs       = $blogs->where('title', 'like', '%' . $request->search . '%');
            $sort_search = $request->search;
        }

        $blogs = $blogs->get();

        return view('admin.blog.list', compact('blogs', 'sort_search', 'code'));
    }

    public function create()
    {
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $blog_categories = BlogCategory::all();
        return view('admin.blog.create', compact('blog_categories', 'code'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title'       => 'required|max:255',
            'video_url' => 'nullable|url|max:255',

        ]);
        $blog = new Blog;

        if ($request->hasFile('banner')) {
            $file     = $request->file('banner');
            $filename = time() . '_banner.' . $file->getClientOriginalExtension();
            $path     = public_path('uploads');
            $file->move($path, $filename);
            $blog->banner = 'uploads/' . $filename;
        }

        if ($request->hasFile('meta_img')) {
            $file     = $request->file('meta_img');
            $filename = time() . '_meta.' . $file->getClientOriginalExtension();
            $path     = public_path('uploads');
            $file->move($path, $filename);
            $blog->meta_img = 'uploads/' . $filename;
        }

        $slug                    = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $blog->category_id       = $request->category_id;
        $blog->title             = $request->title;
        $blog->slug              = strtolower(trim($slug, '-'));
        $blog->description       = $request->description;
        $blog->short_description = $request->short_description;
        $blog->meta_title        = $request->meta_title;
        $blog->meta_description  = $request->meta_description;
        $blog->meta_keywords     = $request->meta_keywords;
        $blog->banner_alt        = $request->banner_alt;
        $blog->video_url = $request->video_url;
        $blog->save();
        $this->addUrlToSitemap($blog);

        dispatch(new \App\Jobs\SendBlogToSubscribers($blog));

        return redirect()->route('admin.blog')->with('success', 'Blog post has been created successfully');

        // return redirect()->route('admin.blog')->with('success', 'Blog post has been created successfully');
    }

    public function edit($id)
    {
        $blog            = Blog::find($id);
        $blog_categories = BlogCategory::all();

        return view('admin.blog.edit', compact('blog', 'blog_categories'));
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();
        $this->removeUrlFromSitemap($blog);

        return redirect()->route('admin.blog')->with('success', 'Blog deleted successfully.');
    }

    public function update(Request $request, $id)
    {
       $request->validate([
    'category_id' => 'required',
    'title'       => 'required|max:255',
    'video_url'   => 'nullable|url|max:255',
]);


        $blog    = Blog::find($id);
        $slug    = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $newSlug = strtolower(trim($slug, '-'));

        // Check if the slug has changed
        if ($blog->slug !== $newSlug) {

            $this->removeUrlFromSitemap($blog);
        }

        $blog->category_id       = $request->category_id;
        $blog->title             = $request->title;
        $blog->slug              = $newSlug;
        $blog->short_description = $request->short_description;
        $blog->description       = $request->description;
        $blog->meta_title        = $request->meta_title;
        $blog->meta_description  = $request->meta_description;
        $blog->meta_keywords     = $request->meta_keywords;
        $blog->banner_alt        = $request->banner_alt;
        $blog->video_url = $request->video_url;

        // Update banner image if a new one is uploaded
        if ($request->hasFile('banner')) {
            if ($blog->banner && file_exists(public_path($blog->banner))) {
                unlink(public_path($blog->banner));
            }
            $file         = $request->file('banner');
            $blog->banner = $this->handleImage($file);
        }

        // Update meta image if a new one is uploaded
        if ($request->hasFile('meta_img')) {
            if ($blog->meta_img && file_exists(public_path($blog->meta_img))) {
                unlink(public_path($blog->meta_img));
            }
            $file           = $request->file('meta_img');
            $blog->meta_img = $this->handleImage($file);
        }

        $blog->save();

        // Add new URL to sitemap
        $this->addUrlToSitemap($blog);

        return redirect()->route('admin.blog')->with('success', 'Blog post has been updated successfully');
    }

    public function searchTitles($term)
    {
        $results = [];

        if ($term) {
            $blogs = Blog::where('title', 'LIKE', "%{$term}%")->limit(10)->get();

            foreach ($blogs as $blog) {
                $results[] = [
                    'title' => $blog->title,
                    'slug'  => $blog->slug,
                    'url'   => route('blog.blog_details', $blog->slug),
                ];
            }
        }

        return response()->json($results);
    }

    private function handleImage($file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $path     = public_path('uploads');
        $file->move($path, $filename);

        return 'uploads/' . $filename;
    }

    public function show()
    {
        $blogs           = Blog::where('category_id', '!=', '34')->orderBy('id', 'desc')->get();
        $blog_categories = BlogCategory::all();

        $metaDesc  = Setting::where('type', 'like', 'description_blogs')->first();
        $metaTitle = Setting::where('type', 'like', 'title_blogs')->first();
        $metaKey   = Setting::where('type', 'like', 'keyword_blog')->first();

        return view('frontend.blogs.index', compact('blogs', 'blog_categories', 'metaDesc', 'metaTitle', 'metaKey'));
    }

    public function showallblogs()
    {
        $blogs           = Blog::orderBy('id', 'desc')->get();
        $blog_categories = BlogCategory::all();
        $metaDesc        = Setting::where('type', 'like', 'description_blogs')->first();
        $metaTitle       = Setting::where('type', 'like', 'title_blogs')->first();
        $metaKey         = Setting::where('type', 'like', 'keyword_blog')->first();

        return view('frontend.blogs.index', compact('blogs', 'blog_categories', 'metaDesc', 'metaTitle', 'metaKey'));
    }

    public function blog_details($slug)
    {
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $blogs           = Blog::latest()->take(6)->get();
        $blog            = Blog::where('slug', $slug)->firstOrFail();
        $blog_categories = BlogCategory::all();

        $staticMetaTitle       = 'Default Blog Title';
        $staticMetaDescription = 'This is the default description for the blog post.';
        $metaTitle             = $blog->meta_title ?? $blog->title ?? $staticMetaTitle;
        // $metaDescription = $blog->meta_description ?? Str::limit(strip_tags($blog->description), 160) ?? $staticMetaDescription;
        $metaDescription = $blog->meta_description;
        $metaKeywords    = $blog->meta_keywords;
        $ogImage         = ! empty($blog->meta_img) ? asset('public/' . $blog->meta_img) : '';

        return view("frontend.blogs.details", compact('blog', 'blogs', 'blog_categories', 'metaTitle', 'metaDescription', 'metaKeywords', 'ogImage', 'code'));
    }

    public function uploadimage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName     = pathinfo($originalName, PATHINFO_FILENAME);
            $extension    = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('blog_image'), $fileName);
            $url = asset('blog_image/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    private function addUrlToSitemap($blog)
    {
        $sitemapPath = base_path('sitemap.xml');

        // Load existing sitemap or create a new one
        if (file_exists($sitemapPath)) {
            $sitemap = simplexml_load_file($sitemapPath);
        } else {
            $sitemap = new \SimpleXMLElement('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
        }

        // Check if the URL already exists
        $blogUrl   = url('blogs/' . $blog->slug);
        $urlExists = false;

        foreach ($sitemap->url as $urlElement) {
            if ((string) $urlElement->loc === $blogUrl) {
                $urlExists = true;
                break;
            }
        }

        // If it doesn't exist, add it
        if (! $urlExists) {
            $urlElement = $sitemap->addChild('url');
            $urlElement->addChild('loc', $blogUrl);
            $urlElement->addChild('lastmod', now()->toAtomString());
            $urlElement->addChild('priority', '0.64'); // Adjust priority as needed
        }

        // Save the updated sitemap
        $sitemap->asXML($sitemapPath);
    }
    private function removeUrlFromSitemap($blog)
    {
        $sitemapPath = base_path('sitemap.xml');

        if (file_exists($sitemapPath)) {

            $sitemapContent = simplexml_load_file($sitemapPath);

            $urlToRemove = url('blogs/' . $blog->slug);

            $newSitemap = new \SimpleXMLElement('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');

            $urlFound = false;

            foreach ($sitemapContent->url as $urlElement) {
                if ((string) $urlElement->loc === $urlToRemove) {
                    $urlFound = true;
                    continue;
                }

                $newUrlElement = $newSitemap->addChild('url');
                $newUrlElement->addChild('loc', (string) $urlElement->loc);
                $newUrlElement->addChild('lastmod', (string) $urlElement->lastmod);
                if (isset($urlElement->priority)) {
                    $newUrlElement->addChild('priority', (string) $urlElement->priority);
                }
            }

            $newSitemap->asXML($sitemapPath);

            return $urlFound;
        }

        return false;
    }

    public function blog_page(Request $request)
    {
        $categories = BlogCategory::all();
        $blogs      = Blog::with('category')->orderBy('id', 'desc');

        if ($request->has('type')) {
            $blogs->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->input('type'));
            });
        }

        // Handle the search functionality
        if ($request->has('search') && ! empty($request->input('search'))) {
            $searchTerm = $request->input('search');
            $blogs->where('title', 'like', '%' . $searchTerm . '%');
        }

        $blogs           = $blogs->get();
        $settings        = setting::all()->keyBy('type');
        $metaDescription = $settings['description_blog_page']->value ?? '';
        $metatitle       = $settings['title_blog_page']->value ?? '';
        $metakeyword     = $settings['keyword_blog_page']->value ?? '';

        return view('frontend.blog-page', compact('blogs', 'categories', 'metaDescription', 'metatitle', 'metakeyword'));
    }

}
