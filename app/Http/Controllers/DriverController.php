<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Driver;
use App\Repositories\DriverRepository;
use Illuminate\Support\Facades\Redirect;

class DriverController extends Controller
{
    protected $driverRepository;

    public function __construct(DriverRepository $driverRepository)
    {
        $this->driverRepository = $driverRepository;
    }
    public function index()
    {
        $info = $this->driverRepository->paginate();
        return view('Admin.driver.driver_list', compact('info'));
    }
    public function add()
    {
        return view('Admin.driver.add_driver');
    }
    public function save(Request $request)
    {
        $this->driverRepository->save($request);
        return redirect()->back()->with('success', 'Driver Added');
    }
    public function edit($id)
    {
        $info = $this->driverRepository->find($id);
        return view('Admin.driver.edit_driver', compact('info'));
    }

    public function delete($id)
    {
        $this->driverRepository->delete($id);
        return redirect()->back()->with('success', 'Driver Deleted');

    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'license' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'make' => 'required',

        ]);
        $id = $request->id;
        $name = $request->name;
        $license = $request->license;
        $email = $request->email;
        $status = $request->status;
        $make = $request->make;

        $this->driverRepository->update($request->id, [
            'name' => $request->name,
            'license' => $request->license,
            'email' => $request->email,
            'status' => $request->status,
            'make' => $request->make,
        ]);
        return redirect()->back()->with('success', 'Driver Updated');

    }
    public function assignpage($user_id)
    {

        $user = User::findOrFail($user_id);
        $free = Driver::where('status', 'free')->where('user_id', null)->paginate();
        return view('Admin.driver.assign_driver', compact('user', 'free'));

    }

    public function assignDriver($user_id)
    {

        $user = User::findOrFail($user_id);

        $free = Driver::whereNull('user_id')->where('status', 'free')->first();


        if ($user->driver_id == null) {

            $user->driver_id = $free->id;
            $user->save();

            $free->user_id = $user->id;
            $free->status = 'busy';
            $free->save();

            $notification = array(
                'message' => 'Driver assigned successfully.',
                'alert-type' => 'success'
            );

            return Redirect::route('user.list')->with($notification);
        } else {

            $notification = array(
                'message' => 'No free drivers available',
                'alert-type' => 'error'
            );
            return Redirect::route('user.list')->with($notification);
        }

    }
    public function info($user_id)
    {

        $user = User::findOrFail($user_id);
        $assignedDriver = $user->assignedDriver;

        return view('Admin.driver.info', compact('user', 'assignedDriver'));
    }

    public function cancel($user_id)
    {
        $this->driverRepository->cancel($user_id);

        $notification = array(
            'message' => 'Ride cancelled Successfully ',
            'alert-type' => 'success'
        );
        return Redirect::route('user.list', ['user_id' => $user_id])->with($notification);
    }

}
