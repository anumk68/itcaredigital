<?php

namespace App\Http\Controllers;

use App\Mail\InquiryNotification;
use App\Models\CustomerInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InquiryController extends Controller
{
public function store(Request $request)
{
    $validated = $request->validate([
        'brand' => 'required|string|max:50',
        'model_number' => 'required|string|max:100',
        'name' => [
            'required',
            'string',
            'max:100',
            'regex:/^[A-Za-z]+(?:\s[A-Za-z]+)?$/'
        ],
        'email' => 'required|email|max:100|unique:customer_inquiries,email',
        'country_code' => 'required|string|max:10',
        'phone_number' => [
            'required',
            'digits:10',
            'regex:/^[0-9]{10}$/'
        ],
        'issue_description' => 'required|string|max:1000',
        'service_slug' => 'nullable|string|max:100',
    ], [
        'name.regex' => 'Name must contain only letters and one space.',
        'phone_number.digits' => 'Phone number must be exactly 10 digits.',
    ]);

    $inquiry = CustomerInquiry::create($validated);

    // Send Email
    Mail::to('contact@allprintersetup.com')->send(new InquiryNotification($inquiry));

    if ($request->expectsJson()) {
        return response()->json(['message' => 'Your inquiry has been submitted successfully!']);
    }

    return back()->with('success', 'Your inquiry has been submitted successfully!');
}

/// functions from harddep sir

public function sendOtp(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $otp = rand(100000, 999999);
 
    $existingVerifiedButEmpty = CustomerInquiry::where('email', $request->email)
        ->whereNotNull('email_verified_at')
        ->where('brand', 'N/A')
        ->first();

   
    $existingUnverified = CustomerInquiry::where('email', $request->email)
        ->whereNull('email_verified_at')
        ->first();

    if ($existingVerifiedButEmpty) {
        // Reset verification and update OTP
        $existingVerifiedButEmpty->update([
            'otp' => $otp,
            'email_verified_at' => null,
        ]);
    } elseif ($existingUnverified) {
        // Just update the OTP
        $existingUnverified->update([
            'otp' => $otp,
        ]);
    } else {
        // Create a new record
        CustomerInquiry::create([
            'email' => $request->email,
            'otp' => $otp,
            'email_verified_at' => null,
            'brand' => 'N/A',
            'model_number' => 'N/A',
            'name' => 'N/A',
            'country_code' => 'N/A',
            'phone_number' => 'N/A',
            'issue_description' => 'N/A',
            'service_slug' => 'N/A',
        ]);
    }

    // Send OTP Email
    Mail::raw("Your OTP is: $otp ", function ($message) use ($request) {
        $message->to($request->email)->subject('Your OTP - AllPrinterSetup');
    });

    return response()->json(['message' => 'OTP sent successfully!']);
}



public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required|digits:6'
    ]);

    $record = CustomerInquiry::where('email', $request->email)
        ->where('otp', $request->otp)
        ->first();

    if (!$record) {
        return response()->json(['message' => 'Invalid OTP.'], 422);
    }

    $record->update([
        'email_verified_at' => now(),
        'otp' => null
    ]);

    return response()->json(['message' => 'OTP verified successfully!']);
}


public function commonstore(Request $request)
{
    // dd($request);
    $validator = Validator::make($request->all(), [
        'brand' => 'required|string|max:50',
        'model_number' => 'required|string|max:100',
        'name' => [
            'required',
            'string',
            'max:100',
            'regex:/^[\pL\s\-]{3,100}$/u'
        ],
     'email' => 'required|email|max:100',
        'country_code' => 'required|string|max:10',
        'phone_number' => [
            'required',
            'digits:10',
            'regex:/^[0-9]{10}$/'
        ],
        'issue_description' => 'required|string|max:1000',
        'service_slug' => 'nullable|string|max:100',
    ], [
        'name.regex' => 'Name must contain only letters and one space.',
        'phone_number.digits' => 'Phone number must be exactly 10 digits.',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    $record = CustomerInquiry::where('email', $request->email)
        ->whereNotNull('email_verified_at')
         ->first();

    if (!$record) {
        return response()->json(['message' => 'Please verify your email before submitting.'], 422);
    }

    $record->update($validator->validated());

    Mail::to('contact@allprintersetup.com')->send(new InquiryNotification($record));

    return response()->json(['message' => 'Your inquiry has been submitted successfully!']);
}


}

