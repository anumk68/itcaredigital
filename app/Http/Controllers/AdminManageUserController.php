<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminManageUserController extends Controller
{
    public function manage_users()
    {
        $data = User::where('role', 'user')->get();
        return view('admin.user.list' , compact('data'));
    }
    public function view_user($id)
    {
        $data = User::find($id);
        return view('admin.user.view' , compact('data'));
    }
public function delete_user($id)
{
    // Delete reviews directly
    \DB::table('reviews')->where('user_id', $id)->delete();

    // Delete orders directly
    \DB::table('orders')->where('user_id', $id)->delete();

    // Delete user
    \DB::table('users')->where('id', $id)->delete();

    return back()->with('success', 'User and related data deleted successfully!');
}


}
