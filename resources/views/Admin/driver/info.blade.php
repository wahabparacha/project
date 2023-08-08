@extends('Admin.admin_dashboard')
@section('Admin')
    <style>
        .button {
            align-content: center;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-radius: 5px;
            margin-top: 100px;
        }

        .assigned-driver-details {
            flex: 1;
        }

        .cancel-ride-button {
            margin-left: 20px;
        }

    </style>

    <div class="container">
        <div class="assigned-driver-details">
            <h2>Assigned Driver Details</h2>
            <br>
            <p>User: {{ $user->name }}</p>
            @if ($assignedDriver)
                <p>Driver Id: {{ $assignedDriver->id }}</p>
                <p>Driver Name: {{ $assignedDriver->name }}</p>
                <p>License No: {{ $assignedDriver->license }}</p>
                <p>Make: {{ $assignedDriver->make }}</p>
            @else
                <p>No driver assigned.</p>
            @endif
        </div>
    </div>
    <div class="cancel-ride-button">
        <a href="{{ route('cancel.ride', ['user_id' => $user->id]) }}">
            <button class="btn btn-danger"> Cancel Ride</button>
        </a>
    </div>
@endsection
