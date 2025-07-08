<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
  public function index()
{
    $data = Subscribe::whereNotNull('email')->orderby('created_at','desc')->get();
    return view('admin.subscribe.list', compact('data'));
}
public function delete($id)
{
    $subscriber = Subscribe::find($id);

    if ($subscriber) {
        $email = $subscriber->email;
        $subscriber->delete();
        return redirect()->back()->with('success', 'Subscriber has been deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Subscriber not found.');
    }
}


}
