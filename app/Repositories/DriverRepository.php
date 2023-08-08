<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class DriverRepository extends BaseRepository
{
    public function __construct(Driver $driver)
    {
        parent::__construct($driver);
    }
    public function save(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'license' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'make' => 'required',

        ]);
        $name = $request->name;
        $license = $request->license;
        $email = $request->email;
        $status = $request->status;
        $make = $request->make;

        $driver = new Driver();
        $driver->name = $name;
        $driver->license = $license;
        $driver->email = $email;
        $driver->status = $status;
        $driver->make = $make;
        $driver->save();

    }
    public function cancel($user_id)
    {
        $user = User::findOrFail($user_id);
        $assignedDriver = $user->assignedDriver;

        if ($assignedDriver) {
            $assignedDriver->user_id = null;
            $assignedDriver->status = 'free';
            $assignedDriver->save();

            $user->driver_id = null;
            $user->save();
        }
    }


}
