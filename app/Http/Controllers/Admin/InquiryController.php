<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InquiryNotification;
use App\Models\CustomerInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InquiryController extends Controller
{
  
  public function inquery_list()
    {
        $data = CustomerInquiry::orderby('created_at', 'desc')->get();
        return view('admin.customer-inquery.list', compact('data'));
    }

    public function inquery_show($id)
    {
        $data = CustomerInquiry::find($id);

        if ($data) {
            return view('admin.customer-inquery.show', compact('data'));
        } else {
            return redirect()->back();
        }
    }
    public function inquery_destroy($id)
    {
        $data = CustomerInquiry::find($id);

        if ($data->delete()) {
            return redirect()->back()->with('success', 'Inquery Deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Not Deleted! , Inquery record not found.');

        }
    }

}

