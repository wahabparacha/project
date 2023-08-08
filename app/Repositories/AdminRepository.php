<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
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
            $filename = date('Ymd') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_image/'), $filename);
            $data['picture'] = $filename;
        }
        $data->save();
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
    }
   
}
