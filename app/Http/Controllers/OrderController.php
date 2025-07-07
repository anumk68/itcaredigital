<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
   use App\Models\User;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;


class OrderController extends Controller
{

public function placeOrder(Request $request)
{
    $request->validate([
        'name'      => 'required|string|max:255',
        'email'     => 'required|email|max:255',
        'phone'     => 'required|min:10|max:15',
        'address'   => 'required',
        'country'   => 'required',
        'state'     => 'required',
        'city'      => 'required',
        'zip'       => 'required',
        'package_id'=> 'required|exists:packages,id',
        'amount'    => 'required|numeric',
    ]);

    if (Auth::check()) {
        $user = Auth::user();
    } else {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone_no' => $request->phone,
                'password' => Hash::make(Str::random(8)),
            ]);
        }

        Auth::login($user);
    }

    // Create Order
    $order = new Order();
    $order->user_id    = $user->id;
    $order->package_id = $request->package_id;
    $order->amount     = $request->amount;
    $order->address    = $request->address;
    $order->country    = $request->country;
    $order->state      = $request->state;
    $order->city       = $request->city;
    $order->zip        = $request->zip;
    $order->notes      = $request->notes;
    $order->status     = 'pending';
    $order->save();

    return redirect()->route('thank.you')->with('success', 'Order placed successfully!');
}


public function orders_list()
{
    $data = Order::with('user', 'package')->get();
    return view('admin.orders.list', compact('data'));
}

public function order_view($id)
{
    $data = Order::with('user', 'package')->find($id);
    return view('admin.orders.view', compact('data'));
}

public function downloadInvoice($id)
{
    $order = Order::with('user', 'package')->findOrFail($id);

    $pdf = PDF::loadView('frontend.invoices.order_invoice', compact('order'));
    return $pdf->download('invoice_order_' . $order->id . '.pdf');
}


}
