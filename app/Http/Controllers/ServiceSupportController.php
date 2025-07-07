<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; // Add this line

class ServiceSupportController extends Controller
{
    public function storePrinterSupportForm(Request $request)
    {   
        $sub = $request->printer;
        if($sub == ''){
            $subject = 'Printer Form Submission';
        }else{
            $subject = $sub.' Printer Form Submission';
        }

        $issue = $request->message ?? '';
        $code  = $request->code ?? '';
        // Validate the form data
        $validatedData = $request->validate([
            'printer_name' => 'required|string',
            'model_number' => 'required|string|max:255',
            'full_name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/u' // Only letters and spaces allowed
            ],
            'phone_number' => [
                'required',
                'digits:10', // Exactly 10 digits required
            ],
        ], [
            'full_name.regex' => 'The full name must only contain letters and spaces.',
            'phone_number.digits' => 'The phone number must be exactly 10 digits.',
        ]);
    
        SupportForm::create([
            'type' => $validatedData['printer_name'],
            'model_number' => $validatedData['model_number'],
            'full_name' => $validatedData['full_name'],
            'phone_number' => $code.$validatedData['phone_number'],
        ]);
        $emailData = [
            'type' => $validatedData['printer_name'],
            'model_number' => $validatedData['model_number'],
            'full_name' => $validatedData['full_name'],
            'phone_number' => $code.$validatedData['phone_number'],
            'issue' => $issue
            // 'subject' => 'HP Printer Form Submission'
          ];
        try {
            // dd("here");
            // Mail::send('frontend.emails.hpprinterform', $emailData, function ($message) use ($emailData) {
            //     $message->to('contact@allprintersetup.com') 
            //             ->subject($emailData['subject']); // Use prepared subject
            // });

            Mail::send('frontend.emails.hpprinterform', $emailData, function ($message) use ($emailData,$subject) {
                $message->to('contact@allprintersetup.com') 
                // $message->to('manpreet.digirush@gmail.com') 
                        ->subject($subject);
            });
        
            return redirect()->back()->with('success', 'Form submitted successfully!');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Email sending failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Email could not be sent. Please try again later.');
        }
    
       
    }

    public function supportListing()
    {
        $data = SupportForm::orderBy('id','desc')->get();
        return view('admin.support.index', ['data' => $data]);
    }

    public function destroy($id)
    {
        $supportAssistance = SupportForm::findOrFail($id);
        $supportAssistance->delete();

        return redirect()->route('support-index')->with('success', 'Support assistance deleted successfully!');
    }

    public function edit($id)
    {
        $supportAssistance = SupportForm::findOrFail($id);
        return view('admin.support.edit', compact('supportAssistance'));
    }

    // Update a specific support assistance record
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|min:10|max:15',
            'model_number' => 'required|string|max:255',
            'type' => 'required|string|max:50',
        ]);

        // Find the support assistance record and update it
        $supportAssistance = SupportForm::findOrFail($id);
        $supportAssistance->update($request->all());

        // Redirect back with a success message
        return redirect()->route('support-index')->with('success', 'Support assistance updated successfully!');
    }

}
