<?php
$Permissions = App\Module_permission::getPermissions(Auth::user()->user_role);
$roles = array();
foreach ($Permissions as $p) {
    $roles[] = $p->module_slug;
}
?>
<?php
 $user_role = DB::table('user_roles')
            ->where('id', Auth::user()->user_role)
            ->first();
            //dd($user_role);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
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

    <style type="text/css">
        .hide {
            display: none;
        }
    </style>
</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
        <div class="navbar-brand">
            <a href="index.html" class="d-inline-block">
                <img style="height: 20px;" src="{{asset('')}}global_assets/images/wheel_app_logo.png" alt="">
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
                    <p style="padding-top: 15px;"> You are logged in with "{{ $user_role->description }}"</p>
                </li>
                <li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<span>{{ Auth::user()->first_name. " ".Auth::user()->last_name }}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
					</div>
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
                        <li class="nav-item nav-item-submenu <?php if (!in_array('reports', $roles)) {
                                                                    echo 'hide';
                                                                } ?>">
                            <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Reports</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Reports">
                                <li class="nav-item"><a href="{{ url('reports') }}" class="nav-link active">View All Reports</a></li>
                                <li class="nav-item"><a href="{{ url('report/add') }}" class="nav-link">Add New</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu <?php if (!in_array('users', $roles)) {
                                                                    echo 'hide';
                                                                } ?>">
                            <a href="#" class="nav-link"><i class="icon-users"></i> <span>Users</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Users">
                                <li class="nav-item"><a href="{{ url('users') }}" class="nav-link active">View All Users</a></li>
                                <li class="nav-item"><a href="{{ url('user/add') }}" class="nav-link">Add New</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu <?php if (!in_array('accounts', $roles)) {
                                                                    echo 'hide';
                                                                } ?>">
                            <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Accounts</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Customers">
                                <li class="nav-item"><a href="{{ url('accounts') }}" class="nav-link active">View All Accounts</a></li>
                                <li class="nav-item"><a href="{{ url('account/add') }}" class="nav-link">Add New</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu <?php if (!in_array('users', $roles)) {
                                                                    echo 'hide';
                                                                } ?>">
                            <a href="#" class="nav-link"><i class="icon-location4"></i> <span>Location</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Location">
                                <li class="nav-item"><a href="{{ url('location') }}" class="nav-link active">View All Locations</a></li>
                                <li class="nav-item"><a href="{{ url('location/add') }}" class="nav-link">Add New</a></li>
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
                @include('flash_message')
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
                        &copy 2019
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