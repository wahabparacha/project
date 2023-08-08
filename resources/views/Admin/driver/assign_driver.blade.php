@extends('Admin.admin_dashboard')
@section('Admin')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
        <meta name="author" content="NobleUI">
        <meta name="keywords"
            content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

        <title>NobleUI - HTML Bootstrap 5 Admin Dashboard Template</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <!-- End fonts -->

        <!-- core:css -->
        <link rel="stylesheet" href="{{ asset('../../../assets/vendors/core/core.css') }}">
        <!-- endinject -->

        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('../../../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
        <!-- End plugin css for this page -->

        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('../../../assets/fonts/feather-font/css/iconfont.css') }}">
        <link rel="stylesheet" href="{{ asset('../../../assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
        <!-- endinject -->

        <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('../../../assets/css/demo2/style.css') }}">
        <!-- End layout styles -->

        <link rel="shortcut icon" href="{{ asset('../../../assets/images/favicon.png') }}" />
        <style>
            .button-container {
                display: flex;
                justify-content: flex-start;
                float: right;

                /* Adjust this based on your alignment preference */
            }

            .button-container button {
                margin-right: 10px;
                background-color: rgb(95, 95, 233);
                /* Optional spacing between buttons */
            }

            .btn {
                background-color: rgb(95, 95, 233);
            }
        </style>


    </head>

    <body>

        <div class="main-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table">
                                        <h3>Assign Driver to {{ $user->name }}</h3>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>License No.</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Make</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($free as $driver)
                                                <tr>
                                                    <td>{{ $driver->id }}</td>
                                                    <td>{{ $driver->name }}</td>
                                                    <td>{{ $driver->license }}</td>
                                                    <td>{{ $driver->email }}</td>
                                                    <td>{{ $driver->status }}</td>
                                                    <td>{{ $driver->make }}</td>
                                                    <td>
                                                        @if (Session::has('success'))
                                                            <div class="alert alert-success" role="alert">
                                                                {{ Session::get('success') }}
                                                            </div>
                                                        @endif
                                                        <form
                                                            action="{{ route('driver.assign', ['user_id' => $user->id]) }}"
                                                            method="post">
                                                            @csrf
                                                                <button type="submit" class="btn">Assign</button>
                                                                @error('driver_id')
                                                                    <span class="alert alert-danger">{{ $message }}</span>
                                                                @enderror
                                                        </form>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- core:js -->
        <script src="{{ asset('../../../assets/vendors/core/core.js') }}"></script>
        <!-- endinject -->

        <!-- Plugin js for this page -->
        <script src="{{ asset('../../../assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('../../../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
        <!-- End plugin js for this page -->

        <!-- inject:js -->
        <script src="{{ asset('../../../assets/vendors/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('../../../assets/js/template.js') }}"></script>
        <!-- endinject -->

        <!-- Custom js for this page -->
        <script src="{{ asset('../../../assets/js/data-table.js') }}"></script>
        <!-- End custom js for this page -->

    </body>
    {!! $free->links('pagination::bootstrap-5') !!}

    </html>
@endsection
