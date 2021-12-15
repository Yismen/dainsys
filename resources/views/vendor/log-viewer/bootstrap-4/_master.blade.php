<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="LogViewer">
    <meta name="author" content="ARCANEDEV">
    <title>LogViewer - Created by ARCANEDEV</title>
    {{-- Styles --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Source+Sans+Pro:400,600' rel='stylesheet' type='text/css'>
    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            font-size: .875rem;
            margin-bottom: 60px;
        }

        .main-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            line-height: 60px;
            background-color: #E8EAF6;
        }

        .main-footer p {
            margin-bottom: 0;
        }

        .main-footer .fa.fa-heart {
            color: #C62828;
        }

        .page-header {
            border-bottom: 1px solid #8a8a8a;
        }

        /*
         * Navbar
         */

        .navbar-brand {
            padding: .75rem 1rem;
            font-size: 1rem;
        }

        .navbar-nav .nav-link {
            padding-right: .5rem;
            padding-left: .5rem;
        }

        /*
         * Boxes
         */

        .card {
            display: block;
            padding: 0;
            min-height: 70px;
            background: #fff;
            width: 100%;
            card-shadow: 0 1px 1px rgba(0,0,0,0.1);
            border-radius: .25rem;
        }

        .card > .card-icon > i,
        .card .card-content .card-text,
        .card .card-content .card-number {
            color: #FFF;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
        }

        .card > .card-icon {
            border-radius: 2px 0 0 2px;
            display: block;
            float: left;
            height: 70px; width: 70px;
            text-align: center;
            font-size: 40px;
            line-height: 70px;
            background: rgba(0,0,0,0.2);
        }

        .card .card-content {
            padding: 5px 10px;
            margin-left: 70px;
        }

        .card .card-content .card-text {
            display: block;
            font-size: 1rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-weight: 600;
        }

        .card .card-content .card-number {
            display: block;
        }

        .card .card-content .progress {
            background: rgba(0,0,0,0.2);
            margin: 5px -10px 5px -10px;
        }

        .card .card-content .progress .progress-bar {
            background-color: #FFF;
        }

        /*
         * Log Menu
         */

        .log-menu .list-group-item.disabled {
            cursor: not-allowed;
        }

        .log-menu .list-group-item.disabled .level-name {
            color: #D1D1D1;
        }

        /*
         * Log Entry
         */

        .stack-content {
            color: #AE0E0E;
            font-family: consolas, Menlo, Courier, monospace;
            white-space: pre-line;
            font-size: .8rem;
        }

        /*
         * Colors: Badge & Infocard
         */

        .badge.badge-env,
        .badge.badge-level-all,
        .badge.badge-level-emergency,
        .badge.badge-level-alert,
        .badge.badge-level-critical,
        .badge.badge-level-error,
        .badge.badge-level-warning,
        .badge.badge-level-notice,
        .badge.badge-level-info,
        .badge.badge-level-debug,
        .badge.empty {
            color: #FFF;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
        }

        .badge.badge-level-all,
        .card.level-all {
            background-color: {{ log_styler()->color('all') }};
        }

        .badge.badge-level-emergency,
        .card.level-emergency {
            background-color: {{ log_styler()->color('emergency') }};
        }

        .badge.badge-level-alert,
        .card.level-alert  {
            background-color: {{ log_styler()->color('alert') }};
        }

        .badge.badge-level-critical,
        .card.level-critical {
            background-color: {{ log_styler()->color('critical') }};
        }

        .badge.badge-level-error,
        .card.level-error {
            background-color: {{ log_styler()->color('error') }};
        }

        .badge.badge-level-warning,
        .card.level-warning {
            background-color: {{ log_styler()->color('warning') }};
        }

        .badge.badge-level-notice,
        .card.level-notice {
            background-color: {{ log_styler()->color('notice') }};
        }

        .badge.badge-level-info,
        .card.level-info {
            background-color: {{ log_styler()->color('info') }};
        }

        .badge.badge-level-debug,
        .card.level-debug {
            background-color: {{ log_styler()->color('debug') }};
        }

        .badge.empty,
        .card.empty {
            background-color: {{ log_styler()->color('empty') }};
        }

        .badge.badge-env {
            background-color: #6A1B9A;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark p-0">
        <a href="/" class="navbar-brand mr-0">
            <i class="fa fa-fw fa-book"></i> Dainsys
        </a>
       {{--  <a href="{{ route('log-viewer::dashboard') }}" class="navbar-brand mr-0">
            <i class="fa fa-fw fa-book"></i> LogViewer
        </a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Route::is('log-viewer::dashboard') ? 'active' : '' }}">
                    <a href="{{ route('log-viewer::dashboard') }}" class="nav-link">
                        <i class="fa fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item {{ Route::is('log-viewer::logs.list') ? 'active' : '' }}">
                    <a href="{{ route('log-viewer::logs.list') }}" class="nav-link">
                        <i class="fa fa-archive"></i> Logs
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <main role="main" class="pt-3">
            @yield('content')
        </main>
    </div>

    {{-- Footer --}}
    <footer class="main-footer">
        <div class="container-fluid">
            <p class="text-muted float-left">
                LogViewer - <span class="badge badge-info">version {{ log_viewer()->version() }}</span>
            </p>
            <p class="text-muted float-right">
                Created with <i class="fa fa-heart"></i> by ARCANEDEV <sup>&copy;</sup>
            </p>
        </div>
    </footer>

    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

    @yield('modals')
    @yield('scripts')
</body>
</html>
