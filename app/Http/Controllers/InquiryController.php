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
        // 'issue_description' => 'required|string|max:1000',
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


public function commonstore(Request $request)
{
    $validator = Validator::make($request->all(), [
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

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    $validated = $validator->validated();

    $inquiry = CustomerInquiry::create($validated);

    // Send Email
    Mail::to('contact@allprintersetup.com')->send(new InquiryNotification($inquiry));

    return response()->json(['message' => 'Your inquiry has been submitted successfully!']);
}


}

