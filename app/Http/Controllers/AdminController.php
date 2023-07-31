<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\oginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display the login view.
     */
    public function Admindashboard()
    {

        return view('Admin.index');
    }


    public function Adminlogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
    public function Adminlogin()
    {
        return view('Admin.AdminLogin');

    }

    public function Adminprofile()
    {
        // $id = Auth::user()->id;
        // $profiledata = User::find($id);
        $id = Auth::user()->id; // Fetch all admin records from the database
        $profileData = User::find($id);
        return view('Admin.adminprofile', compact('profileData'));
    }

    public function Adminprofilestore(Request $request)
    {
        $id = Auth::user()->id; // Fetch all admin records from the database
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('picture')) {
            $file = $request->file('picture');
            @unlink(public_path('upload/admin_image/' . $data->picture));
            $filename = date('Ymdhi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_image/'), $filename);
            $data['picture'] = $filename;
        }

        $data->save();
        $notification = array(
            'message' => 'Admin Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function Adminchangepassword()
    {
        $id = Auth::user()->id; // Fetch all admin records from the database
        $profileData = User::find($id);
        return view('Admin.admin_changepassword', compact('profileData'));
    }
    public function Adminupdatepassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => 'Old password Does not match',
                'alert-type' => 'error'
            );
            return back()->with($notification);

        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password Changed successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function Admincalender()
    {
        return view('Admin.calender');
    }
}
