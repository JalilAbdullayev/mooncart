<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("back/images/favicon.png")}}"/>
    <title>
        @yield('title', $settings->title . ' | Admin Panel')
    </title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset("back/node_modules/morrisjs/morris.css")}}" rel="stylesheet"/>
    <!--Toaster Popup message CSS -->
    <link href="{{asset("back/node_modules/toast-master/css/jquery.toast.css")}}" rel="stylesheet"/>
    <!-- Custom CSS -->
    <link href="{{asset("back/dist/css/style.min.css")}}" rel="stylesheet"/>
    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset("back/dist/css/pages/dashboard1.css")}}" rel="stylesheet"/>
    @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-default-dark fixed-layout">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">
            {{ $settings->title }}
        </p>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('admin.index') }}">
                    <!-- Logo icon -->
                    <img src="{{asset("storage/".$settings->logo)}}" alt="homepage" class="light-logo w-100"/>
                    <!--End Logo icon -->
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav me-auto">
                    <!-- This is  -->
                    <li class="nav-item"><a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                                            href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                    <li class="nav-item"><a
                            class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                            href="javascript:void(0)"><i class="icon-menu"></i></a></li>
                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    @include('back.layouts.sidebar')
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">
        © 2024 @if(date('Y')>2024)
            - {{ date('Y') }}
        @endif
        <a href="{{ route('home') }}">
            {{ $settings->title }}
        </a>
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset("back/node_modules/jquery/dist/jquery.min.js")}}"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="{{asset("back/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset("back/dist/js/perfect-scrollbar.jquery.min.js")}}"></script>
<!--Wave Effects -->
<script src="{{asset("back/dist/js/waves.js")}}"></script>
<!--Menu sidebar -->
<script src="{{asset("back/dist/js/sidebarmenu.js")}}"></script>
<!--Custom JavaScript -->
<script src="{{asset("back/dist/js/custom.min.js")}}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{asset("back/node_modules/raphael/raphael-min.js")}}"></script>
<script src="{{asset("back/node_modules/morrisjs/morris.min.js")}}"></script>
<script src="{{asset("back/node_modules/jquery-sparkline/jquery.sparkline.min.js")}}"></script>
<!-- Popup message jquery -->
<script src="{{asset("back/node_modules/toast-master/js/jquery.toast.js")}}"></script>
<!-- Chart JS -->
<script src="{{asset("back/dist/js/dashboard1.js")}}"></script>
<script src="{{asset("back/node_modules/toast-master/js/jquery.toast.js")}}"></script>
@yield('js')
</body>
</html>
