<?php
namespace App\Http\Controllers;

use App\Mail\SubscriptionConfirmationMail;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\BrandSeries;
use App\Models\Code;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Package;
use App\Models\Review;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Subscribe;
use App\Models\User;
use App\Models\Vlog;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    // In your controller (e.g. HomeController.php)

    public function showHeader()
    {
        $brands = Brand::where('status', 'active')
            ->with([
                'services' => function ($query) {
                    $query->where('status', 'active');
                },
            ])
            ->get();

        return view('layouts.header', compact('brands'));
    }

    public function hp_printer($brand_slug)
    {
        $brand = Brand::with('services')->where('slug', $brand_slug)->first();

        $blogs = Blog::where('slug', 'like', '%' . $brand_slug . '%')
            ->latest()
            ->take(6)
            ->get();

        $faqs = Faq::where('brand_id', $brand->id)
            ->where('status', 'active')
            ->get();

        return view('frontend.hp_printer', compact('brand', 'blogs', 'faqs', 'brand_slug'));
    }

    public function show($brand_slug, $service_slug)
    {
        $brand = Brand::where('slug', $brand_slug)
            ->where('status', 'active')
            ->first();

        if (! $brand) {
            return redirect()->route('notfound')->with('error', 'Brand not found');
        }

        $service = Service::where('slug', $service_slug)
            ->where('status', 'active')
            ->first();

        if (! $service) {
            return redirect()->route('notfound')->with('error', 'Service not found');
        }

        $blogs = Blog::where('slug', 'like', '%' . $service_slug . '%')
            ->latest()
            ->take(6)
            ->get();

        $faqs = Faq::where('service_id', $service->id)
            ->where('status', 'active')
            ->get();

        $seriesList = BrandSeries::where('brand_id', $brand->id)
            ->where('status', 'active')
            ->pluck('series_name');

        $brands = Brand::where('status', 'active')->get();

        // 👇 Get all active services for the current brand using the pivot
        $brandServices = $brand->services()->where('status', 'active')->get();

        return view('frontend.service_detail', compact(
            'brand',
            'service',
            'blogs',
            'faqs',
            'seriesList',
            'brands',
            'brandServices'
        ));
    }

    //members
    public function member()
    {
        $packages = Package::with(['review' => function ($query) {
            $query->where('status', 1);
        }])->with('orders')->where('status', 1)->latest()->get();

        $orders = Order::with('user', 'package')->latest()->get();
        return view('frontend.members', compact('packages', 'orders'));
    }

    public function cart($id)
    {
        $package = Package::findOrFail($id);
        return view('frontend.cart', compact('package'));
    }

    public function video()
    {
        $vlogs = Vlog::with('category')->orderBy('created_at', 'desc')->get();
        return view('frontend.video', compact('vlogs'));
    }
    public function videoDetail($slug)
    {
        $vlog = Vlog::where('slug', $slug)->firstOrFail();

        // Optionally: recent posts
        $recent_posts = Vlog::orderBy('created_at', 'desc')->limit(5)->get();

        return view('frontend.video_detail', compact('vlog', 'recent_posts'));
    }

    public function account()
    {
        $userid = auth()->guard('user')->user()->id;
        $orders = Order::where('user_id', $userid)->get();
        return view('frontend.account', compact('orders'));
    }

    public function package_detail($slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();

        $packages = Package::where('slug', '!=', $slug)
            ->where('status', 1)
            ->latest()
            ->take(4)
            ->get();

        // Get all reviews with user info manually (without relationship)
        $reviews = Review::where('package_id', $package->id)
            ->where('status', '1')
            ->get()
            ->map(function ($review) {
                $review->user = User::find($review->user_id); // manually attach user
                return $review;
            });

        return view('frontend.package_detail', compact('package', 'packages', 'reviews'));
    }

    public function checkout($id)
    {
        $package = Package::findOrFail($id);
        return view('frontend.checkout', compact('package'));
    }

    public function suggestions(Request $request)
    {
        $query = $request->input('q');

        $blogs    = Blog::where('slug', 'like', "%{$query}%")->get();
        $brands   = Brand::where('slug', 'like', "%{$query}%")->get();
        $services = Service::where('slug', 'like', "%{$query}%")->get();

        return response()->view('partials.suggestions', compact('blogs', 'brands', 'services'));
    }
    public function installation()
    {
        return view('frontend.installation');
    }

    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscribe,email',
        ]);

        try {
            $email = $validated['email'];
            Mail::raw("New subscription from: $email", function ($message) use ($email) {
                $message->to('contact@allprintersetup.com')
                    ->subject('New Subscription');
            });
            Mail::to($email)->send(new SubscriptionConfirmationMail($email));
            Subscribe::create(['email' => $email]);

            return response()->json(['success' => 'Thanks for subscribing!']);
        } catch (\Exception $e) {
            Log::error('Subscribe email failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to send email. Try again later.'], 500);
        }
    }

    //common function for common forms and section
    public function common()
    {
        $code = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        return view('layouts.app', compact('code'));
    }

    public function about()
    {
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $metaTitle       = Setting::where('type', 'title_About_us')->value('value');
        $metaDescription = Setting::where('type', 'description_About_us')->value('value');
        $metaKeywords    = Setting::where('type', 'keyword_About_us')->value('value');
        return view("frontend.about", compact('metaTitle', 'metaDescription', 'metaKeywords', 'code'));
    }

    public function notfound()
    {
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $metaTitle       = '404 Error - Page not found!';
        $metaDescription = 'Somthing went wrong, try again.';
        return view('frontend.404error', compact('metaTitle', 'metaDescription', 'code'));
    }

    public function index()
    {
        $code   = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $agent  = new Agent();
        $brands = Brand::where('status', 'active')->get();

        $isMobile        = $agent->isMobile();
        $blogs           = Blog::orderBy('id', 'desc')->limit(7)->get();
        $metaTitle       = Setting::where('type', 'title_home')->value('value');
        $metaDescription = Setting::where('type', 'description_home')->value('value');
        $metaKeywords    = Setting::where('type', 'keyword_home')->value('value');

        $packages = Package::with(['review' => function ($query) {
            $query->where('status', 1);
        }])->with(['orders'])->where('status', 1)->latest()->get();

        $orders = Order::with('user', 'package')->latest()->get();
        return view("frontend.index", compact('metaTitle', 'metaDescription', 'metaKeywords', 'isMobile', 'blogs', 'code', 'brands', 'packages', 'orders'));
    }

    public function testroute()
    {
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $metaTitle       = Setting::where('type', 'title_hp_printer_support')->value('value');
        $metaDescription = Setting::where('type', 'description_hp_printer_support')->value('value');
        $metaKeywords    = Setting::where('type', 'keyword_hp_printer_support')->value('value');
        return view("frontend.hpprinterhavlet", compact('metaTitle', 'metaDescription', 'metaKeywords', 'code'));
    }
    public function blog()
    {
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $metaDescription = Setting::where('type', 'like', 'description_blogs')->value('value');
        $metaTitle       = Setting::where('type', 'like', 'title_blogs')->value('value');
        $metaKeywords    = Setting::where('type', 'like', 'keyword_blog')->value('value');
        $blogs           = Blog::orderBy('id', 'desc')->get();
        return view("frontend.blogs.index", compact('blogs', 'metaDescription', 'metaTitle', 'metaKeywords', 'code'));
    }

    public function contact()
    {
        $metaTitle       = Setting::where('type', 'title_contact')->value('value');
        $metaDescription = Setting::where('type', 'description_contact')->value('value');
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        return view("frontend.contact", compact('metaTitle', 'metaDescription', 'code'));
    }

    public function epson_business()
    {
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $metaTitle       = Setting::where('type', 'title_epson_printer_support')->value('value');
        $metaDescription = Setting::where('type', 'description_epson_printer_support')->value('value');
        $metaKeywords    = Setting::where('type', 'keyword_epson_printer_support')->value('value');
        return view("frontend.epson-business-suppport", compact('metaTitle', 'metaDescription', 'metaKeywords', 'code'));
    }

    public function epson_service()
    {
        $code = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        // return view("frontend.epson-service-support");
        $metaTitle       = Setting::where('type', 'title_canon_printer_support')->value('value');
        $metaDescription = Setting::where('type', 'description_canon_printer_support')->value('value');
        $metaKeywords    = Setting::where('type', 'keyword_canon_printer_support')->value('value');
        return view("frontend.canon-printer-support", compact('metaTitle', 'metaDescription', 'metaKeywords', 'code'));
    }

    public function hprinter()
    {
        $code = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        return view("frontend.hewlett-packard-printer", compact('code'));
    }

    public function installation_printer()
    {
        // return view("frontend.hp-printer-help");
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $metaTitle       = Setting::where('type', 'title_installation_printer')->value('value');
        $metaDescription = Setting::where('type', 'description_installation_printer')->value('value');
        $metaKeywords    = Setting::where('type', 'keyword_installation_printer')->value('value');
        return view("frontend.installation", compact('metaTitle', 'metaDescription', 'metaKeywords', 'code'));
    }

    public function hpprinter()
    {
        // return view("frontend.hp-printer-help");
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $metaTitle       = Setting::where('type', 'title_brother_printer_support')->value('value');
        $metaDescription = Setting::where('type', 'description_brother_printer_support')->value('value');
        $metaKeywords    = Setting::where('type', 'keyword_brother_printer_support')->value('value');
        return view("frontend.brother-printer-support", compact('metaTitle', 'metaDescription', 'metaKeywords', 'code'));
    }

    public function hpprintersupport()
    {
        $code = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        return view("frontend.hp-printer-support", compact('code'));
    }

    public function services()
    {
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $metaTitle       = Setting::where('type', 'title_service')->value('value');
        $metaDescription = Setting::where('type', 'description_service')->value('value');
        $metaKeywords    = Setting::where('type', 'keyword_service')->value('value');
        return view("frontend.services", compact('metaTitle', 'metaDescription', 'metaKeywords', 'code'));
    }

    public function supporthpprinter()
    {
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $metaTitle       = Setting::where('type', 'title_hp_printer_support')->value('value');
        $metaDescription = Setting::where('type', 'description_hp_printer_support')->value('value');
        $metaKeywords    = Setting::where('type', 'keyword_hp_printer_support')->value('value');
        return view("frontend.support-hp-printer", compact('metaTitle', 'metaDescription', 'metaKeywords', 'code'));
    }

    public function appinvoice()
    {
        $code = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        return view("admin.app-invoice", compact('code'));
    }

    public function privacypolicy()
    {
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $metaTitle       = Setting::where('type', 'title_privacy_policy')->value('value');
        $metaDescription = Setting::where('type', 'description_privacy_policy')->value('value');
        $metaKeywords    = Setting::where('type', 'keyword_hp_printer_support')->value('value');
        return view("frontend.privacy-policy", compact('metaTitle', 'metaDescription', 'metaKeywords', 'code'));
    }

    public function termspage()
    {
        $code            = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        $metaTitle       = Setting::where('type', 'title_terms_of_service')->value('value');
        $metaDescription = Setting::where('type', 'description_terms_of_service')->value('value');
        $metaKeywords    = '';
        return view("frontend.terms-of-service", compact('metaTitle', 'metaDescription', 'metaKeywords', 'code'));
    }

    public function virtualchat()
    {
        $code = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        date_default_timezone_set('Asia/Kolkata');
        $bg   = "#152545";
        $time = date('H:i:s A');
        $v    = "random";
        $sol  = "IamSolution";
        return view('frontend.virtual-chat', compact('bg', 'time', 'v', 'sol', 'code'));
    }

    public function iframeindex()
    {
        return view('frontend.run.index');
    }

    public function iframeindex2()
    {
        return view('frontend.run.index2');
    }

    public function iframenewloader()
    {
        return view('frontend.run.new-loader');
    }

    public function iframeselectwifiusb()
    {
        return view('frontend.run.Select-Wi-Fi-or-USB-connection');
    }

    public function iframewifisetuploading()
    {
        return view('frontend.run.wifi-setup-loading');
    }

    public function iframeprintertypeusb()
    {
        return view('frontend.run.printer-type-usb');
    }

    public function iframefixing()
    {
        return view('frontend.run.fixing');
    }

    public function iframeform()
    {
        $code = Code::orderByRaw("code = '+1' DESC, code ASC")->get();
        return view('frontend.run.form', compact('code'));
    }

    public function getSolution(Request $request)
    {
        $issue  = $request->issue;
        $record = DB::table('issues')->where('issue', $issue)->first();

        if ($record) {
            return response()->json(['solution' => $record->solution]);
        } else {
            return response()->json(['solution' => 'No Solution Available']);
        }
    }

    public function iframesendmail(Request $request)
    {
        $details = [
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'model' => $request->model,
            'brand' => $request->brand,
        ];
        $code = $request->code;
        // contact@allprintersetup.com
        Mail::raw("New Inquiry Details:\n\nName: {$details['name']}\nPhone: {$code}{$details['phone']}\nEmail: {$details['email']}\nModel: {$details['model']}\nBrand: {$details['brand']}", function ($message) {
            $message->to('contact@allprintersetup.com')
                ->subject('New enquiry submitted')
                ->from('contact@allprintersetup.com');
        });

        return response()->json(['status' => 'sent']);
    }

    public function errorpage()
    {
        return view("frontend.404error");
    }

    public function logout(Request $request)
    {

        Auth::logout();

        return redirect()->route('admin.login');
    }

}
