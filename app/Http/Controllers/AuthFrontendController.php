<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthFrontendController extends Controller
{

    public function register_frontend()
    {
        return view('frontend.register_frontend');
    }

    public function register_frontendStore(Request $request)
    {
        $request->validate([
            'first_name'            => 'required|string',
            'lname'                 => 'nullable|string',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

        $user           = new User();
        $user->name     = $request->first_name . ' ' . $request->lname;
        $user->email    = $request->email;
        $user->role     = 'user';
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            Auth::guard('web')->login($user);
            return redirect()->route('home')->with('success', 'Registered successfully!');
        } else {
            return redirect()->back()->with('error', 'Registration failed, please try again.');
        }
    }

    public function login_frontend()
    {
        return view('frontend.login_frontend');
    }

    public function login_frontend_auth(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember    = $request->has('remember');

        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $user = Auth::guard('web')->user();

            if ($user->role === 'user') {
                return redirect()->route('home')->with('success', 'Logged in successfully!');
            }

            Auth::guard('web')->logout();
            return redirect()->route('login_frontend')->with('error', 'Unauthorized role.');
        }

        return back()->withInput()->with('error', 'Invalid email or password.');
    }

    public function user_logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login_frontend')->with('success', 'Logged out successfully.');
    }

    public function updateAccount(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'phone'    => 'nullable|string|max:20',
            'zip_code' => 'nullable|string|max:10',
            'address'  => 'nullable|string',
            'country'  => 'nullable|string|max:100',
            'state'    => 'nullable|string|max:100',
            'city'     => 'nullable|string|max:100',
        ]);

        $user = Auth::user();

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->zip_code = $request->zip_code;
        $user->address  = $request->address;
        $user->country  = $request->country;
        $user->state    = $request->state;
        $user->city     = $request->city;
        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }

}
