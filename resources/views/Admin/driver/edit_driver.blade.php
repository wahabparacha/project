@extends('Admin.admin_dashboard')
@section('Admin')
    <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body" style="margin-top: 70px">

                    <h3 style="margin-bottom: 10px">Update Driver</h3>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('driver.update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $info->id }}">
                        <div class="md-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name"
                                value="{{ $info->name }}">
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">License</label>
                            <input type="text" class="form-control" name="license" placeholder="Enter license"
                                value="{{ $info->license }}">
                            @error('license')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email"
                                value="{{ $info->email }}">
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">status</label>
                            <input type="text" class="form-control" name="status" placeholder="Enter status"
                                value="{{ $info->status }}">
                            @error('status')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Make</label>
                            <input type="text" class="form-control" name="make" placeholder="Enter Make and Model"
                                value="{{ $info->make }}">
                            @error('make/model')
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
