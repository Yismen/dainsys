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
        <link rel="stylesheet" type="text/css" href="{{ mix('css/site.css') }}">
        <!-- Site Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>
    <body class="sidebar-collapse">
        <div class="wrapper" id="app">
            <div class="content-wrapper">
                <div class="hidden-xs">
                    <back-to-top></back-to-top>
                </div>
                <section class="content">
                    @yield('content')
                </section>

            </div>
            <footer class="flex flex-column justify-space-between main-footer px-15 py-10 md:flex-row md:px-20">
                <div>
                    <strong>
                        Copyright &copy; {{ date("Y") }}
                        <a href="{{ url('/admin') }}">
                            {{ $app_name }}, {{ $client_name }}
                        </a>.
                    </strong> All rights reserved.
                </div>
                <div class="md:m-0 mt-7">
                    @include('layouts.partials.links.webmaster')
                </div>
            </footer>
        </div>
        <script src="{{ mix('js/site.js') }}"></script>
        @stack('scripts')
    </body>

</html>
