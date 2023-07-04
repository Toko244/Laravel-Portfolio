<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Upcube - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!-- jquery.vectormap css -->
    <link href="{{ asset('admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" >
</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="index.html" class="auth-logo">
                                <img src="{{ asset('admin/assets/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto" alt="">
                                <img src="{{ asset('admin/assets/images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="">
                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Verify Email</b></h4>

                    <div class="p-3">
                        <form action="{{ route('verification.send') }}" method="POST">
                            @csrf
                            @if (session('status') == 'verification-link-sent')
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    A new verification link has been sent to the email address you provided during registration.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                @else
                                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                    Enter Your <strong>E-mail</strong> in order to verify your account
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="form-group mb-3">
                                <div class="col-xs-12">
                                    <input class="form-control" type="email" name="email" id="email" required="" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group pb-2 text-center row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Send Email</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->


     <!-- JAVASCRIPT -->
     <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
     <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
     <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>


     <!-- apexcharts -->
     <script src="{{ asset('admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

     <!-- jquery.vectormap map -->
     <script src="{{ asset('admin/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
     <script src="{{ asset('admin/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

     <!-- Required datatable js -->
     <script src="{{ asset('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
     <script src="{{ asset('admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

     <!-- Responsive examples -->
     <script src="{{ asset('admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
     <script src="{{ asset('admin/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

     <script src="{{ asset('admin/assets/js/pages/dashboard.init.js') }}"></script>

     <!-- App js -->
     <script src="{{ asset('admin/assets/js/app.js') }}"></script>

     <!--tinymce js-->
     <script src="{{ asset('admin/assets/libs/tinymce/tinymce.min.js') }}"></script>

     <!-- init js -->
     <script src="{{ asset('admin/assets/js/pages/form-editor.init.js') }}"></script>

     <script src="{{ asset('admin/assets/js/code.js') }}"></script>

     <script src="{{ asset('admin/assets/js/sweetAlert.js') }}"></script>

</body>

</html>
