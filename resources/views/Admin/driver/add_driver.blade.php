@extends('Admin.admin_dashboard')
@section('Admin')

    <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body" >

                    <h2 class="card-title" style="margin-top: 75px">Add Driver</h2>

                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('driver.save') }}">
                        @csrf
                        <div class="md-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name">
                            @error('username')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">License No.</label>
                            <input type="text" class="form-control" name="license" placeholder="Enter license number">
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email">
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Status</label>
                            <input type="status" class="form-control" name="status" placeholder="Enter status">
                            @error('status')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Make</label>
                            <input type="text" class="form-control" name="make" placeholder="Enter make model of car">
                            @error('phone')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
