<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Support\Facades\File;



class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function login(Request $request)
    {
        // Validate the input fields and provide custom error messages if needed
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
                return redirect()->intended('admin/dashboard'); // Redirect to dashboard or intended page
            } else {
                // If the password is incorrect
                return back()->withErrors([
                    'password' => 'The provided password does not match our records.',
                ])->withInput();
            }
        
            return back()->withErrors([
                'email' => 'No user found in the database.',
            ])->withInput();
        
    }

    public function dashboardPage()
    {
        return view('admin.dashboard');
    }

    public function metapage() {
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
        // Fetch the specific setting by ID
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
    
    

public function updateSettingForm(Request $request, $id){

    $request->validate([

        'value' => 'string',
    ]);
    $setting_value = $request->value;

    $settings = Setting::findOrFail($id);


    $settings->value = $setting_value;
    $settings->save();
    return redirect()->route('setting.index')->with('success', 'Setting updated successfully');

}

public function deleteSettingForm($id){
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

   
    
    

}
