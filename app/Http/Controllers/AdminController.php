<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AdminRepository;

class AdminController extends Controller
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }
    public function Admindashboard()
    {
        return view('Admin.index');
    }
    public function Adminlogout(Request $request)
    {
        $this->adminRepository->logout($request);
        return redirect('/admin/login');

    }
    public function Adminlogin()
    {
        return view('Admin.AdminLogin');

    }
    public function Adminprofile()
    {
        $id = Auth::user()->id;
        $profileData = $this->adminRepository->find($id);
        return view('Admin.adminprofile', compact('profileData'));
    }

    public function Adminprofilestore(Request $request)
    {
        $this->adminRepository->Adminprofilestore($request);
        return redirect('/admin/profile');
    }

    public function Adminchangepassword()
    {
        $id = Auth::user()->id; // Fetch all admin records from the database
        $profileData = $this->adminRepository->find($id);
        return view('Admin.admin_changepassword', compact('profileData'));
    }
    public function Adminupdatepassword(Request $request)
    {
        $this->adminRepository->Adminupdatepassword($request);
        return redirect()->back();
    }
}
