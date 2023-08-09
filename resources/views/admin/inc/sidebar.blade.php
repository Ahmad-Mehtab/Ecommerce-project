<style>
    .img-fluid {

        max-width: 75%;
        height: auto;
    }
</style>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark bg-gradient-red accordion" id="accordionSidebar"
        style="background-color:#060606;">
        <!-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark bg-gradient-red accordion" id="accordionSidebar"> -->

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/dashboard') }}">
            <div class="sidebar-brand-text mx-3">
                <img style="" src="{{ asset('site_assets/images/Updated logo back office Stardom UK.png') }}"
                    alt="stardom-logo" class="img-fluid footer-logo">
            </div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        @if (session()->has('ADMIN_LOGIN') || session()->has('ADMIN_JUNIOR_LOGIN'))
            <!-- Nav Item - Dashboard -->
            <li class="nav-item @yield('Dashboard')">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item @yield('users_list')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users"
                    aria-expanded="true" aria-controls="users">
                    <i class="fa fa-chart-bar"></i>
                    <span>Users</span>
                </a>
                <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('admin/add-affiliate') }}">
                            <i class="fa fa-user"></i> <span>Add Affiliate</span></a>
                        <a class="collapse-item" href="{{ url('admin/users_list') }}">
                            <i class="fas fa-users"></i>
                            <span>User List</span></a>
                    </div>
            </li>

            {{-- <li class="nav-item @yield('Users_list')">
                <a class="nav-link" href="{{url('admin/users_list')}}">
                    <i class="fas fa-users"></i>
                    <span>User List</span></a>
            </li> --}}

            <li class="nav-item @yield('admin_points_approval_list')">
                <a class="nav-link" href="{{ url('admin/admin_points_approval_list') }}">
                    <i class="fa fa-tasks"></i>
                    <span>Points Approval List</span></a>
            </li>
            <li class="nav-item @yield('user_submissions')">
                <a class="nav-link" href="{{ url('admin/user_submissions') }}">
                    <i class="fa fa-tasks"></i>
                    <span>User Submissions List</span></a>
            </li>
        @else
            <li class="nav-item @yield('User_details')">
                <a class="nav-link" href="{{ url('/admin/category') }}">
                    <i class="fas fa-users"></i>
                    <span>Add Category</span></a>
            </li>
            <li class="nav-item @yield('opportunities')">
                <a class="nav-link" href="{{ url('/admin/brand') }}">
                    <i class="fas fa-tasks"></i>
                    <span>Add Brand</span></a>
            </li>
            <li class="nav-item @yield('opportunities')">
                <a class="nav-link" href="{{ url('/admin/add-product') }}">
                    <i class="fas fa-tasks"></i>
                    <span>Add Product</span></a>
            </li>
            {{-- <li class="nav-item @yield('points_redemption')">
                <a class="nav-link" href="{{url('user/points_redemption')}}">
                    <i class="fa fa-tasks"></i>
                    <span>Points Redemption</span></a>
            </li> --}}
            {{-- @endif
            <!-- @if (session()->has('AFFILIATE_ROLE'))

            @endif -->
            @if (session()->has('ADMIN_LOGIN') || session()->has('ADMIN_JUNIOR_LOGIN')) --}}

            {{-- The below commented code when client want separate page for  contest users --}}
            {{-- <li class="nav-item @yield('reports')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#report"
                    aria-expanded="true" aria-controls="users">
                    <i class="fa fa-chart-bar"></i>
                    <span>Reports</span>
                </a>
                <div id="report" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/contest_users')}}"><i class="fa fa-user"></i> <span>Contest Users</span></a>

                </div>
            </li>     --}}
            {{-- film Role CRUD --}}
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#role"
                    aria-expanded="true" aria-controls="role">
                    <i class="fa fa-life-ring" aria-hidden="true"></i>
                    <span>Film Roles</span>
                </a>
                <div id="role" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('admin/add_film_role') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
                            <span>Add Role</span>
                        </a>
                        <a class="collapse-item" href="{{ url('admin/film_roles_list') }}">
                            <i class="fa fa-th-list" aria-hidden="true"></i>&nbsp;
                            <span>Roles List</span>
                        </a>
                    </div>
                </div>
            </li>


            {{-- film CRUD --}}
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#film"
                    aria-expanded="true" aria-controls="film">
                    <i class="fa fa-film" aria-hidden="true"></i>
                    <span>Films</span>
                </a>
                <div id="film" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('admin/add_film') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
                            <span>Add Film</span>
                        </a>
                        <a class="collapse-item" href="{{ url('admin/films_list') }}">
                            <i class="fa fa-th-list" aria-hidden="true"></i>&nbsp;
                            <span>Films List</span>
                        </a>
                    </div>
                </div>
            </li>

            {{-- Packages CRUD --}}
            <li class="nav-item @yield('packages_payments')">
                <a class="nav-link" href="{{ url('admin/payment_report_list') }}">
                    <i class="fa fa-tasks"></i>
                    <span>Purchase Reports</span></a>
            </li>

            @if (false)
                <li class="nav-item @yield('packages')">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pack"
                        aria-expanded="true" aria-controls="users">
                        <i class="fa fa-archive"></i>
                        <span>Package</span>
                    </a>
                    <div id="pack" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ url('admin/package') }}"><i class="fa fa-tags"></i>
                                <span>Add Package</span></a>
                            <a class="collapse-item" href="{{ url('admin/package_list') }}"><i
                                    class="fa fa-tags"></i> <span>Package List</span></a>

                        </div>
                </li>
                {{-- <li class="nav-item @yield('features')">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#feat"
                        aria-expanded="true" aria-controls="users">
                        <i class="fa fa-archive"></i>
                        <span>Feature</span>
                    </a>
                    <div id="feat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{url('admin/feature')}}"><i class="fa fa-tags"></i> <span>Add Feature</span></a>
                            <a class="collapse-item" href="{{url('admin/feature_list')}}"><i class="fa fa-tags"></i> <span>Feature List</span></a>

                    </div>
                </li> --}}
            @endif


            @if (true)
                <li class="nav-item @yield('configurations')">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#config"
                        aria-expanded="true" aria-controls="users">
                        <i class="fa fa-cogs"></i>
                        <span>Configurations</span>
                    </a>
                    <div id="config" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ url('admin/points_category') }}"><i
                                    class="fa fa-tags"></i> <span>Add Points Category</span></a>
                            <a class="collapse-item" href="{{ url('admin/points_category_all') }}"><i
                                    class="fa fa-tags"></i> <span>List Points Category</span></a>
                            <a class="collapse-item" href="{{ url('admin/action_event') }}"><i
                                    class="fa fa-id-badge"></i> <span>Add Action/Event</span></a>
                            <a class="collapse-item" href="{{ url('admin/action_event_all') }}"><i
                                    class="fa fa-id-badge"></i> <span>List Action/Event</span></a>
                            <a class="collapse-item" href="{{ url('admin/reward_points') }}"><i
                                    class="fa fa-tasks"></i> <span>Add Reward Points</span></a>
                            <a class="collapse-item" href="{{ url('admin/reward_points_all') }}"><i
                                    class="fa fa-tasks"></i> <span>List Reward Points</span></a>
                            <a class="collapse-item" href="{{ url('admin/points_price') }}"><i
                                    class="fa fa-wrench"></i> <span>Configure Points Price</span></a>
                        </div>
                </li>
            @endif
        @endif

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <x-app-layout>

            </x-app-layout>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
