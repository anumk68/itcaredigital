<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\Blog;
use App\Models\CustomerInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Setting;
use App\Models\SettingsPage;
use App\Models\SettingsPag;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'is_register' => 'required|boolean',
            'password' => 'nullable|string',
            'name' => 'nullable|string',
        ]);

        $otp = rand(100000, 999999);

        session([
            'otp' => $otp,
            'otp_email' => $request->email,
            'otp_is_register' => $request->is_register,
            'otp_password' => $request->password,
            'otp_name' => $request->name,
        ]);

        if ($request->is_register) {
            Mail::to($request->email)->send(new SendOtpMail($otp));
            return response()->json([
                'success' => true,
                'message' => 'OTP sent to your email for verification.',
                'is_register' => true
            ]);
        } else {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email not found in our records.'
                ]);
            }

            if (!Hash::check($request->password, $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Incorrect password.'
                ]);
            }

            // $adminEmail1 = 'hardeepsingh.digirush@gmail.com';
            $adminEmail1 = 'manpreet.digirush@gmail.com';
            // $adminEmail2 = 'nitish.digirush@gmail.com';
            // $adminEmail3 = 'deepak.digirush@gmail.com';

            Mail::to($adminEmail1)->send(new SendOtpMail($otp));
            // Mail::to([$adminEmail2, $adminEmail3])->send(new SendOtpMail($otp));

            return response()->json([
                'success' => true,
                'message' => 'OTP request received. Your OTP has been sent to admin, please contact your admin.',
                'is_register' => false
            ]);
        }
    }


    public function verifyOtpAndRegister(Request $request)
    {
        $request->validate(['otp' => 'required']);
        if ($request->otp == session('otp') && session('otp_is_register')) {
            $user = User::create([
                'name' => session('otp_name'),
                'email' => session('otp_email'),
                'password' => Hash::make(session('otp_password')),
                'role' => 'admin',
            ]);

            $adminEmail = 'nitish.digirush@gmail.com';
            $userEmail = session('otp_email');
            $timestamp = now()->toDateTimeString();

            Mail::send([], [], function ($message) use ($adminEmail, $userEmail, $timestamp) {
                $message->to($adminEmail)
                    ->subject("New Account Registration with 'admin' role")
                    ->text("A new account has been registered with 'admin' role:\n\n" .
                        "Email: $userEmail\n" .
                        "Time: $timestamp");
            });

            Auth::login($user);
            session()->forget(['otp', 'otp_email', 'otp_is_register', 'otp_password', 'otp_name']);
            return response()->json(['success' => true, 'message' => 'Registration successful']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid OTP']);
    }



    public function verifyOtpAndLogin(Request $request)
    {
        $request->validate(['otp' => 'required']);
        if ($request->otp == session('otp') && !session('otp_is_register')) {
            $user = User::where('email', session('otp_email'))->where('role', 'admin')->orwhere('role', 'super_admin')->first();
            if (!$user || !Hash::check(session('otp_password'), $user->password)) {
                return response()->json(['success' => false, 'message' => 'Invalid credentials']);
            }
            Auth::login($user);
            session()->forget(['otp', 'otp_email', 'otp_is_register', 'otp_password', 'otp_name']);
            return response()->json(['success' => true, 'message' => 'Login successful']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid OTP']);
    }


    public function sendForgotPasswordOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);
        $email = $request->email;
        if (
            session()->has('forgot_password_otp_email') &&
            session('forgot_password_otp_email') === $email &&
            session()->has('forgot_password_otp_expires_at') &&
            Carbon::now()->lt(Carbon::parse(session('forgot_password_otp_expires_at')))
        ) {
            return response()->json([
                'success' => true,
                'message' => 'OTP already sent to your email. It will expire in ' .
                    Carbon::now()->diffInSeconds(Carbon::parse(session('forgot_password_otp_expires_at'))) . ' seconds.'
            ]);
        }
        $otp = rand(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(5);
        session([
            'forgot_password_otp' => $otp,
            'forgot_password_otp_email' => $email,
            'forgot_password_otp_expires_at' => $expiresAt
        ]);
        Mail::raw("Your password reset OTP code is: $otp\nThis OTP will expire in 5 minutes.", function ($message) use ($email) {
            $message->to($email)->subject('Password Reset OTP Code');
        });
        return response()->json(['success' => true, 'message' => 'OTP sent to your email.']);
    }

    public function verifyForgotPasswordOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required'
        ]);
        if (
            session()->has('forgot_password_otp') &&
            $request->otp == session('forgot_password_otp') &&
            session()->has('forgot_password_otp_email') &&
            $request->email === session('forgot_password_otp_email') &&
            session()->has('forgot_password_otp_expires_at') &&
            Carbon::now()->lt(Carbon::parse(session('forgot_password_otp_expires_at')))
        ) {
            session(['forgot_password_otp_verified' => true]);
            return response()->json(['success' => true, 'message' => 'OTP verified.']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid OTP']);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'new_password' => 'required|min:8|confirmed'
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found']);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        session()->forget([
            'forgot_password_otp',
            'forgot_password_otp_email',
            'forgot_password_otp_expires_at',
            'forgot_password_otp_verified',
            'otp',
            'otp_email',
            'otp_expires_at'
        ]);
        return response()->json(['success' => true, 'message' => 'Password updated successfully']);
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('admin/dashboard');  
        } else {
            // If the password is incorrect
            return back()->withErrors([
                'password' => 'The provided password does not match our records.',
            ])->withInput();
        }
    }

    public function dashboardPage()
    {
        return view('admin.dashboard');
    }

    public function metapage()
    {
        $descriptionsettings = Setting::where('type', 'like', 'description_%')->get();
        $titlesettings = Setting::where('type', 'like', 'title_%')->get();
        $keywordsettings = Setting::where('type', 'like', 'keyword_%')->get();

        $sett = Setting::where('type', 'like', 'fields%')
            ->orWhere('type', 'like', 'links%')
            ->get();

        // Fetch $settings if needed
        $settings = Setting::all(); // Or however you retrieve $settings

        return view("admin.settings.index", compact('descriptionsettings', 'titlesettings', 'keywordsettings', 'sett', 'settings'));
    }

    public function update(Request $request)
    {
        $type = $request->input('type');
        $id = $request->input('id');
        $value = $request->input('value');

        // Handle specific types like site_name and timezone
        if ($type == 'site_name') {
            $this->overWriteEnvFile('APP_NAME', $value);
        } elseif ($type == 'timezone') {
            $this->overWriteEnvFile('APP_TIMEZONE', $value);
        } else {
            // Handle image fields
            if ($this->isImageField($type, $request)) {
                if ($request->hasFile($type)) {
                    $file = $request->file($type);
                    $uploadId = handleImage($file);
                    $value = $uploadId;
                }
            }

            // Find or create setting
            $settings = Setting::where('type', $type)->first();

            if ($settings) {
                $settings->value = is_array($value) ? json_encode($value) : $value;
                $settings->save();
            } else {
                $settings = new Setting;
                $settings->type = $type;
                $settings->value = is_array($value) ? json_encode($value) : $value;
                $settings->save();
            }
        }

        return back()->with('success', 'Settings updated successfully');
    }

    protected function isImageField($fieldType, Request $request)
    {
        // Define which types are considered image fields
        $imageFields = ['image', 'profile_picture', 'avatar']; // Add your image field types here

        return in_array($fieldType, $imageFields);
    }

    protected function overWriteEnvFile($key, $value)
    {
        $path = base_path('.env');

        if (File::exists($path)) {
            $contents = File::get($path);
            $pattern = "/^{$key}=(.*)$/m";
            $replacement = "{$key}={$value}";

            if (preg_match($pattern, $contents)) {
                $contents = preg_replace($pattern, $replacement, $contents);
            } else {
                $contents .= PHP_EOL . $replacement;
            }

            File::put($path, $contents);
        }
    }

    public function editSettingForm($id)
    {
        $setting = Setting::find($id);
        if (!$setting) {
            return redirect()->route('metapage')->with('error', 'Setting not found');
        }

        return view('admin.settings.edit', ['setting' => $setting]);
    }

    public function updateSetting(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'type' => 'required|string',
            'value' => 'required|string',
        ]);

        $setting = Setting::find($request->input('id'));

        if (!$setting) {
            return redirect()->route('settings.index')->with('error', 'Setting not found');
        }

        $setting->value = $request->input('value');
        $setting->save();

        return redirect()->route('metaPage')->with('success', 'Setting updated successfully');
    }

    public function updateSettingForm(Request $request, $id)
    {
        $request->validate([
            'value' => 'string',
        ]);

        $setting_value = $request->value;
        $settings = Setting::findOrFail($id);
        $settings->value = $setting_value;
        $settings->save();
        return redirect()->route('setting.index')->with('success', 'Setting updated successfully');
    }

    public function deleteSettingForm($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        return redirect()->back()->with('success', 'Setting has been deleted');
    }
    public function new_meta_add(Request $request)
    {
        $request->validate([
            'metaselect' => 'string|in:description_,title_,keyword_',
            'type' => 'string',
            'value' => 'string',
        ]);

        $prefix = $request->input('metaselect');

        $name = str_replace(' ', '_', $request->type);

        $prefixedName = $prefix . $name;

        $file_value = $request->value;

        $settings = new Setting;
        $settings->type = $prefixedName;
        $settings->value = $file_value;
        $settings->save();

        return redirect()->back()->with('success', 'Setting added successfully.');
    }

    //new pages functions
    public function pagesList(){
        $blogs = SettingsPage::all();
        return view('admin.settings.pages.list',compact('blogs'));
    }

    public function pagesCreate(){
        return view('admin.settings.pages.create');
    }

    public function pagesCreatePost(Request $request){
        $request->validate([
            'page' => 'required|unique:settings_pages,page'
        ]);
        $page       = new SettingsPage();
        $page->page = $request->page;
        $page->save();
        return redirect()->route('pages.list')->with('success','Page Created Successfully!');
    }

    public function pagesDestroy($id){
        $setting = SettingsPage::findOrFail($id);
        $page    = $setting->page;
        $pages   = SettingsPag::where('page',$page)->first();
        if($pages){
            $pages->delete();
        }
        
        $setting->delete();
        return redirect()->back()->with('success', 'Page had been deleted!');
    }

    public function metaList(){
        $blogs = SettingsPag::all();
        return view('admin.settings.meta.list',compact('blogs'));
    }

    public function metaCreate(){
        $pages = SettingsPage::all();
        return view('admin.settings.meta.create',compact('pages'));
    }

    public function metaCreatePost(Request $request){
        $request->validate([
            'page' => 'required|unique:settings_page,page'
        ]);
        $meta = new SettingsPag();
        $meta->page = $request->page;
        $meta->title = $request->title;
        $meta->description  = $request->description;
        $meta->keyword      = $request->keyword;
        $faqSchema          = str_replace(["\r", "\n"], '', $request->faq_schema);
        $extaSchema         = str_replace(["\r","\n"], '', $request->extra_schema);
        $meta->faq_schema   = $faqSchema ?? '';
        $meta->extra_schema = $extaSchema ?? '';
        $meta->save();
        return redirect()->route('meta.list')->with('success','Meta Created Successfully!');
    }

    public function metaEdit($id){
        $setting = SettingsPag::find($id);
        $pages   = SettingsPage::all();
        if (!$setting) {
            return redirect()->route('metapage')->with('error', 'Setting not found');
        }

        return view('admin.settings.meta.edit', ['setting' => $setting , 'pagedata' => $pages]);
    }

    public function metaEditPost(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'page' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $setting               = SettingsPag::find($request->input('id'));
        $setting->page         = $request->page;
        $setting->title        = $request->title;
        $setting->description  = $request->description;
        $setting->keyword      = $request->keyword ?? '';
        $faqSchema             = str_replace(["\r", "\n"], '', $request->faq_schema);
        $extaSchema            = str_replace(["\r","\n"], '', $request->extra_schema);
        $setting->faq_schema   = $faqSchema ?? '';
        $setting->extra_schema = $extaSchema ?? '';
        $setting->save();

        return redirect()->route('meta.list')->with('success', 'Meta Details had been updated!');
    }

    public function metaDestroy($id){
        $setting = SettingsPag::findOrFail($id);
        $setting->delete();
        return redirect()->back()->with('success', 'Meta Details had been deleted!');
    }
    //new pages function ends

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
