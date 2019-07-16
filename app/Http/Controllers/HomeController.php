<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_users = User::all();
        
        return view('home', compact('all_users'));
    }

    function deleteuser($user_id)
    {
        User::find($user_id)->delete();
        return back()->with('delete_status', 'User Deleted Successfully!');
    }

    function edituser($product_id)
    {
        $single_user_info = User::findOrFail($product_id);
        return view("user/edit", compact('single_user_info'));
    }

    function edituserinsert(Request $request)
    {
        User::find($request->user_id)->update([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
        ]);

        return back()->with('updatestatus', 'User updated Successfully!');
    }

}
