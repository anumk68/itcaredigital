<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; // Add this line


class ContactController extends Controller
{
  //store function of contact
  public function contactstore(Request $request)
  {
    
    $model_num = $request->model_no ?? '';
    $brand     = $request->brand ?? '';
    $code      = $request->code ?? '';
    $issue     = $request->message ?? '';
    $validateData = $request->validate([
      'email' => 'email',
      'full_name' => 'regex:/^[a-zA-Z\s]*$/',
      'contact' => 'digits:10',
      'subject' => 'nullable',
      'message' => 'nullable',
      'city' => 'nullable|regex:/^[a-zA-Z\s]*$/',
      'type' => 'nullable',
    ], [
      'email.required' => 'The email field is required.',
      'email.email' => 'Please enter a valid email address.',
      'full_name.required' => 'The Name field is required.',
      'full_name.regex' => 'The Name field should not contain special characters or numbers.',
      'city.nullable' => 'The city field is required.',
      'city.regex' => 'The city field should not contain special characters or numbers.',
      'contact.required' => 'The Contact field is required.',
      'contact.digits' => 'The Contact must be a valid 10-digit number.',
    ]);
    
    if ($validateData) {
      $contact = new Contact;
      $contact->email = $validateData['email'];
      $contact->full_name = $validateData['full_name'];
      $contact->contact = $code.$validateData['contact'];
      $contact->subject = $validateData['subject'] ?? null;
      $contact->type = $validateData['type'];
      // $contact->message = $validateData['message'] ?? null;
      $contact->save();
      $emailData = [
        'full_name' => $validateData['full_name'],
        'email' => $validateData['email'],
        'contact' => $code.$validateData['contact'],
        'city' => $validateData['city'] ?? 'N/A',
        'type' => $validateData['type'] ?? 'N/A',
        'issue' => $issue ?? 'N/A',
        'subject' => $validateData['subject'] ?? 'Enquire Now Form Submission',
        'model' => $model_num ?? 'Model Number Not Present',
        'brand' => $brand ?? 'Brand is not present'
      ];

      try {
    
        Mail::send('frontend.emails.contact', $emailData, function ($message) use ($emailData) {
            $message->to('contact@allprintersetup.com') 
            // $message->to('manpreet.digirush@gmail.com') 
                    ->subject($emailData['subject']); // Use prepared subject
        });
    
        return redirect()->back()->with('success', 'Contact submitted successfully!');
    } catch (\Exception $e) {
        // Log the error
        Log::error('Email sending failed: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Email could not be sent. Please try again later.');
    }

      // return redirect()->back()->with('success', 'Contact submitted successfully!');
    } else {
      return redirect()->back()->with('warning', 'Something went wrong!');
    }
  }


  public function contactmodalstore(Request $request)
  {
 
    $validateData = $request->validate([
      'code' => 'nullable|numeric',
      'email' => 'email',
      'full_name' => 'regex:/^[a-zA-Z\s]*$/',
      'contact' => 'digits:10',
      'subject' => 'nullable',
      'message' => 'nullable',
      'city' => 'nullable|regex:/^[a-zA-Z\s]*$/',
      'type' => 'nullable',
    ], [
      'email.required' => 'The email field is required.',
      'email.email' => 'Please enter a valid email address.',
      'full_name.required' => 'The Name field is required.',
      'full_name.regex' => 'The Name field should not contain special characters or numbers.',
      'city.regex' => 'The city field should not contain special characters or numbers.',
      'contact.required' => 'The Contact field is required.',
      'contact.digits' => 'The Contact must be a valid 10-digit number.',
    ]);

    if ($validateData) {
      $contact = new Contact;
      $contact->email = $validateData['email'];
      $contact->full_name = $validateData['full_name'];
      $contact->contact = $validateData['contact'];
      $contact->subject = $validateData['subject'] ?? null;
      $contact->type = $validateData['type'];
      $contact->message = $validateData['message'] ?? null;
      $contact->save();
       // Prepare email data
       $emailData = [
        'full_name' => $validateData['full_name'],
        'email' => $validateData['email'],
        'contact' => ($validateData['code'] ?? '') . $validateData['contact'],
        'city' => $validateData['city'] ?? 'N/A',
        'type' => $validateData['type'] ?? 'N/A',
        'message' => $validateData['message'] ?? 'No message provided',
        'subject' => $validateData['subject'] ?? 'New Contact Form Submission',
    ];

    // Send the email
    try {
      
        Mail::send('frontend.emails.contact', $emailData, function ($message) use ($emailData) {
            $message->to('contact@allprintersetup.com') 
                    ->subject($emailData['subject']); // Use prepared subject
        });

        return redirect()->back()->with('success', 'Contact submitted successfully!');
      } catch (\Exception $e) {
          // Log the error
          Log::error('Email sending failed: ' . $e->getMessage());
          return redirect()->back()->with('error', 'Email could not be sent. Please try again later.');
      }
      } else {
        return redirect()->back()->with('warning', 'Something went wrong!');
      }
  }

  //listing only contact
  public function ContactListing()
  {
    $data = Contact::where('type', 'contact_us')->orderBy('id','desc')->get();
    return view('admin.contact.index', ['data' => $data]);
  }

  //contact show page
  public function ContactShow($id)
  {
    $data =  Contact::find($id);
    return view('admin.contact.show', ['data' => $data]);
  }

  //contact create page
  public function Contactcreate()
  {
    return view('admin.contact.create');
  }

  //contact delete page
  public function ContactDelete($id)
  {
    $data = Contact::find($id);
    if ($data) {
      $data->delete();
    }
    return redirect()->back()->with('success', 'contact submit successfully!');
  }


  //listing only assistance
  public function AssistanceListing()
  {
    $data = Contact::where('type', 'assistance')->orderBy('id','desc')->get();
    return view('admin.assistance.index', ['data' => $data]);
  }


  //listing only assistance
  public function AssistanceShow($id)
  {
    $data =  Contact::find($id);
    return view('admin.assistance.show', ['data' => $data]);
  }


  //assistance delete page
  public function AssistanceDelete($id)
  {
    $data = Contact::find($id);

    if ($data) {

      $data->delete();

      return redirect()->route('assistance-index')->with('success', 'Assistance record deleted successfully!');
    } else {

      return redirect()->route('assistance-index')->with('error', 'Assistance record not found.');
    }
  }
}
