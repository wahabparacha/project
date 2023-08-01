<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserServices;
class CrudController extends Controller
{
    protected $userRepository;
    protected $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $data = $this->userService->getAllUsers();
        // return $data;
        return view('cruds.user_list', compact('data'));
    }
    public function add()
    {
        return view('cruds.add_user');
    }
    public function save(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',

        ]);

        $username = $request->username;
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;
        $address = $request->address;

        $user = new User();
        $user->username = $username;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->phone = $phone;
        $user->address = $address;
        $user->save();

        return redirect()->back()->with('success message', 'User Added');
    }

    public function edit($id)
    {
        $data = $this->userService->getUserById($id);
        return view('cruds.edit_user', compact('data'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',

        ]);
        $id = $request->id;
        $username = $request->username;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;

        $this->userService->update($request->id, [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success message', 'User Updated');

    }
    public function delete($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->back()->with('success message', 'User Deleted');

    }
}
