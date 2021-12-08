<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <meta id="_token" name="_token" content="{{ csrf_token() }}">  Laravel 5.3 token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Ecco | {{ $page_header ?? 'Admin Header' }}</title>
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/site.css') }}">
        <!-- Site Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    </head>
    <body class="sidebar-collapse">
        <div class="wrapper" id="app">
            <!-- Main Header -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="hidden-xs">
                    <back-to-top></back-to-top>
                </div>
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->

            </div>
            <!-- /.content-wrapper -->
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                    @include('layouts.partials.links.webmaster')
                </div>
                <!-- Default to the left -->
                <strong>
                    Copyright &copy; {{ date("Y") }}
                    <a href="{{ url('/admin') }}">
                        {{ $app_name }}, {{ $client_name }}
                    </a>.
                </strong> All rights reserved.
            </footer>
            <div class="control-sidebar-bg"></div>
            <!-- /.control-sidebar -->
            <!-- Add the sidebars background. This div must be placed
                immediately after the control sidebar -->
        </div>
        <!-- ./wrapper -->
        <!-- REQUIRED JS SCRIPTS -->
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ mix('js/site.js') }}"></script>
        @stack('scripts')
    </body>

</html>
