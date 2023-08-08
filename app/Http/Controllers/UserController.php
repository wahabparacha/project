<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Repositories\UserRepository;
class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $data = $this->userRepository->paginate();
        return view('Admin.user.user_list', compact('data'));
    }
    public function add()
    {
        return view('Admin.user.add_user');
    }
    public function save(Request $request)
    {
        $this->userRepository->save($request);
        return redirect()->back()->with('success', 'User Added');
    }
    public function edit($id)
    {
        $data = $this->userRepository->find($id);
        return view('Admin.user.edit_user', compact('data'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',

        ]);
        $id = $request->id;
        $username = $request->username;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;

        $this->userRepository->update($request->id, [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->back()->with('success', 'User Updated');

    }

    public function delete($id)
    {
        $this->userRepository->delete($id);
        return redirect()->back()->with('success', 'User Deleted');

    }
}
