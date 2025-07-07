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
        $data = User::find($id);
        $data->delete();
        return back()->with('success', 'User deleted successfully!');
    }
}
