
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('dainsys.app_client') }} | {{ $page_header ?? 'Admin Header' }}</title>
    
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.partials.navbar')
        <!-- /.navbar -->
        
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                {{-- <img src="{{ asset('images/logo-with-text.png') }}" alt="{{ config('dainsys.client_name') }} Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-light">{{ config('dainsys.client_name') }}</span>
            </a>
            
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                @auth
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @include('layouts.partials._user-photo')
                    <div class="info">
                        <a href="#" class="d-block">{{ $user->name }}</a>
                    </div>
                </div>
                @endauth
                
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar Menu -->
                @include('layouts.partials.sidebar-left')
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
            
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="app">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $page_header ?? 'Please repace' }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            @include('layouts.partials._breadcrumbs')
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            
            @include('layouts.partials._session-flash-messages')
            <div class="hidden-xs">
                <back-to-top></back-to-top>
            </div>
            <loading-component></loading-component>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        
        <!-- Main Footer -->
        <footer class="justify-content-between main-footer pr-5 row">
            <strong>Copyright &copy; 2017-{{ now()->year }} <a href="{{ url('/admin') }}">{{ $app_name }}, {{ $client_name }}</a>.</strong>
            {{-- <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div> --}}            
            <div class="float-right hidden-xs">
                @include('layouts.partials.links.webmaster')
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->
    
    <!-- REQUIRED SCRIPTS -->
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')    
</body>
</html>
    