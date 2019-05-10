<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wheel Tire @yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('')}}global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{asset('')}}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('')}}assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('')}}assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('')}}assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('')}}assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('')}}global_assets/js/main/jquery.min.js"></script>
    <script src="{{asset('')}}global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/loaders/blockui.min.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('')}}global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/pickers/daterangepicker.js"></script>

    <script src="{{asset('')}}assets/js/app.js"></script>
    <script src="{{asset('')}}global_assets/js/demo_pages/dashboard.js"></script>
    <!-- /theme JS files -->
</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
        <div class="navbar-brand">
            <a href="index.html" class="d-inline-block">
                <img src="{{asset('')}}global_assets/images/logo_icon_light.png" alt="">
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-md-auto">

                <li class="nav-item">
                    <a href="#" class="navbar-nav-link">
                        <i class="icon-switch2"></i>
                        <span class="d-md-none ml-2">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">
       
        @section('sidebar')
        <!-- Main sidebar -->
        <div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                <span class="font-weight-semibold">Navigation</span>
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">
                <!-- Main navigation -->
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">
                        <!-- Main -->
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link active">
                                <i class="icon-home4"></i>
                                <span>
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Reports</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Reports">
                                <li class="nav-item"><a href="{{ url('reports') }}" class="nav-link active">View All Reports</a></li>
                                <li class="nav-item"><a href="{{ url('add_report') }}" class="nav-link">Add New</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-users"></i> <span>Users</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Users">
                                <li class="nav-item"><a href="{{ url('users') }}" class="nav-link active">View All Users</a></li>
                                <li class="nav-item"><a href="{{ url('add_user') }}" class="nav-link">Add New</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Customers</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Customers">
                                <li class="nav-item"><a href="{{ url('customers') }}" class="nav-link active">View All Customers</a></li>
                                <li class="nav-item"><a href="{{ url('add_customer') }}" class="nav-link">Add New</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-location4"></i> <span>Location</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Location">
                                <li class="nav-item"><a href="{{ url('location') }}" class="nav-link active">View All Locations</a></li>
                                <li class="nav-item"><a href="{{ url('add_location') }}" class="nav-link">Add New</a></li>
                            </ul>
                        </li>


                    </ul>
                </div>
                <!-- /main navigation -->
            </div>
            <!-- /sidebar content -->
        </div>
        <!-- /main sidebar -->
        @show

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header page-header-light">

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <span class="breadcrumb-item active">Dashboard</span>
                        </div>

                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">
                @yield('content')
            </div>
            <!-- /content area -->


            <!-- Footer -->
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-footer">
                    <span class="navbar-text">
                        &copy; 2015 - 2018.
                    </span>

                </div>
            </div>
            <!-- /footer -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</body>
</html>
