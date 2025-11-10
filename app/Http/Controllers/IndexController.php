<?php

namespace App\Http\Controllers;

use App\Mail\NewSubscriber;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\CustomerInquiry;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\SettingsPag;

class IndexController extends Controller
{
    protected $title_default;
    protected $description_default;
    protected $keyword_default;

    public function __construct()
    {
        $this->title_default = 'Digital Marketing Services | Internet Marketing Agency';
        $this->description_default  = 'We offer SEO, PPC, and complete digital marketing solutions.';
        $this->keyword_default   = '';
    }

    //
    public function index()
    {
        $data  = SettingsPag::where('page','home')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        $blogs = Blog::latest()->take(3)->get();
        return view('frontend.index',compact('blogs','title','desc','key','faq','extra'));
    }
    public function about()
    {
        $data  = SettingsPag::where('page','about-us')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.about-us',compact('title','desc','key','faq','extra'));
    }
    public function blog()
    {
        $blogs = Blog::all();
        $data  = SettingsPag::where('page','blog')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.blog', compact('blogs','title','desc','key','faq','extra'));
    }
    public function blog_detail($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blogs = Blog::latest()->limit(3)->get();
        $data  = SettingsPag::where('page','blog-detail')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.blog-details', compact('blog', 'blogs','title','desc','key','faq','extra'));
    }
    public function digital_content_marketing()
    {
        $data  = SettingsPag::where('page','digital-content-marketing')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.digital_content_marketing', compact('title','desc','key','faq','extra'));
    }
    public function ecommerce_seo()
    {
        $data  = SettingsPag::where('page','ecommerce-seo')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.ecommerce_seo', compact('title','desc','key','faq','extra'));
    }
    public function local_seo()
    {
        $data  = SettingsPag::where('page','local-seo')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.local_seo', compact('title','desc','key','faq','extra'));
    }
    public function ppc_service()
    {
        $data  = SettingsPag::where('page','ppc-services')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.ppc', compact('title','desc','key','faq','extra'));
    }
    public function privacy()
    {
        $data  = SettingsPag::where('page','privacy')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.privacy', compact('title','desc','key','faq','extra'));
    }
    public function refund()
    {
        $data  = SettingsPag::where('page','refund-policy')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.refund', compact('title','desc','key','faq','extra'));
    }
    public function search_engine_optimization()
    {
        $data  = SettingsPag::where('page','search-engine-optimization')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.search_engine_optimization', compact('title','desc','key','faq','extra'));
    }
    public function social_media_marketing()
    {
        $data  = SettingsPag::where('page','social-media-marketing')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.social_media_marketing', compact('title','desc','key','faq','extra'));
    }
    public function terms_condition()
    {
        $data  = SettingsPag::where('page','terms-condition')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.terms', compact('title','desc','key','faq','extra'));
    }
    public function web_design()
    {
        $data  = SettingsPag::where('page','web-design')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.web_design', compact('title','desc','key','faq','extra'));
    }
    public function web_development()
    {
        $data  = SettingsPag::where('page','web-development')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.web_development', compact('title','desc','key','faq','extra'));
    }
    public function contact()
    {
        $data  = SettingsPag::where('page','contact')->first();
        $title = $data->title ?? $this->title_default;
        $desc  = $data->description ?? $this->description_default;
        $key   = $data->keyword ?? $this->keyword_default;
        $faq   = $data->faq_schema ?? '';
        $extra = $data->extra_schema ?? '';
        return view('frontend.contact', compact('title','desc','key','faq','extra'));
    }
    public function subscribe_store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscribes,email',
        ]);
        $email = new Subscribe();
        $email->email = $validated['email'];
        $email->save();
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NewSubscriber($validated['email']));
        return response()->json([
            'success' => true,
            'message' => 'Thank you for subscribing!',
        ]);
    }

    public function sendOtpForForm(Request $request)
    {
       
        $request->validate(['email' => 'required|email']);
        $otp = rand(100000, 999999);
        Session::put('email_otp', $otp);
        Session::put('otp_email', $request->email);
        try {
            Mail::raw("Your OTP is: $otp", function ($msg) use ($request) {
                $msg->to($request->email)->subject('Your Email Verification OTP');
            });
            return response()->json(['status' => 'success', 'message' => 'OTP sent successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Error sending OTP: ' . $e->getMessage()]);
        }
    }
    public function verifyOtp(Request $request)
    {
        $otp = Session::get('email_otp');
        if ($otp && $otp == $request->otp) {
            Session::put('email_verified', true);
            return response()->json(['status' => 'success', 'message' => 'Email verified successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'Invalid OTP']);
    }
    public function storeFrom(Request $request)
    {
        
        if (!Session::get('email_verified')) {
            return response()->json(['status' => 'error', 'message' => 'Please verify your email first']);
        }
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'service' => 'required',
            'phone' => 'required|min:10|max:15'
        ]);
        $contact = CustomerInquiry::create($data);
        $adminEmail = env('MAIL_FROM_ADDRESS');  
        //$adminEmail = 'contact@itcaredigital.com';
        $body = "New Inquiry Received:\n\n" .
            "Name: {$contact->name}\n" .
            "Email: {$contact->email}\n" .
            "Phone: {$contact->phone}\n" .
            "Service: {$contact->service}";

        Mail::raw($body, function ($msg) use ($adminEmail) {
            $msg->to($adminEmail)->subject('New Contact Received');
        });
        Session::forget(['email_otp', 'otp_email', 'email_verified']);
        return response()->json(['status' => 'success', 'message' => 'Form submitted successfully!']);
    }
}
