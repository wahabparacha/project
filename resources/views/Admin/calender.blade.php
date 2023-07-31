@extends('Admin.admin_dashboard')
@section('Admin')
    <!DOCTYPE html>
    <!--
                Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
                Author: NobleUI
                Website: https://www.nobleui.com
                Portfolio: https://themeforest.net/user/nobleui/portfolio
                Contact: nobleui123@gmail.com
                Purchase: https://1.envato.market/nobleui_admin
                License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
                -->
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
        <meta name="author" content="NobleUI">
        <meta name="keywords"
            content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

        <title>Calender</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <!-- End fonts -->

        <!-- core:css -->
        <link rel="stylesheet" href="../../../assets/vendors/core/core.css">
        <!-- endinject -->

        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="../../../assets/vendors/fullcalendar/main.min.css">
        <!-- End plugin css for this page -->

        <!-- inject:css -->
        <link rel="stylesheet" href="../../../assets/fonts/feather-font/css/iconfont.css">
        <link rel="stylesheet" href="../../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
        <!-- endinject -->

        <!-- Layout styles -->
        <link rel="stylesheet" href="../../../assets/css/demo2/style.css">
        <!-- End layout styles -->

        <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
    </head>

    <body>
        <div class="main-wrapper">

            <!-- partial:../../partials/_sidebar.html -->

            <!-- partial -->

            <div class="page-wrapper">
                <div class="page-content">

                    <div class="row">
                        <div class="col-md-14">
                            <div class="row">
                                <div class="col-md-3 d-none d-md-block">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title mb-4">Full calendar</h6>
                                            <div id='external-events' class='external-events'>
                                                <h6 class="mb-2 text-muted">Draggable Events</h6>
                                                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                                                    <div class='fc-event-main'>Birth Day</div>
                                                </div>
                                                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                                                    <div class='fc-event-main'>New Project</div>
                                                </div>
                                                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                                                    <div class='fc-event-main'>Anniversary</div>
                                                </div>
                                                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                                                    <div class='fc-event-main'>Clent Meeting</div>
                                                </div>
                                                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                                                    <div class='fc-event-main'>Office Trip</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id='fullcalendar'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="fullCalModal" class="modal fade">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="modalTitle1" class="modal-title"></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"><span
                                            class="visually-hidden">close</span></button>
                                </div>
                                <div id="modalBody1" class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary">Event Page</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="createEventModal" class="modal fade">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="modalTitle2" class="modal-title">Add event</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"><span
                                            class="visually-hidden">close</span></button>
                                </div>
                                <div id="modalBody2" class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Example label</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="Example input">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Another label</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2"
                                                placeholder="Another input">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- partial:../../partials/_footer.html -->

                <!-- partial -->

            </div>
        </div>

        <!-- core:js -->
        <script src="../../../assets/vendors/core/core.js"></script>
        <!-- endinject -->

        <!-- Plugin js for this page -->
        <script src="../../../assets/vendors/moment/moment.min.js"></script>
        <script src="../../../assets/vendors/fullcalendar/main.min.js"></script>
        <!-- End plugin js for this page -->

        <!-- inject:js -->
        <script src="../../../assets/vendors/feather-icons/feather.min.js"></script>
        <script src="../../../assets/js/template.js"></script>
        <!-- endinject -->

        <!-- Custom js for this page -->
        <script src="../../../assets/js/fullcalendar.js"></script>
        <!-- End custom js for this page -->

    </body>

    </html>
@endsection
