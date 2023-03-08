@extends('layouts.'.$layout->site(), ['page_header'=>'Home', 'page_description'=>'Home page!',
'hide_content_header'=>false])

@section('content')
<div class="site">
    {{-- Navbar --}}
    <section
        class="navbar-default navbar-fixed-top d-flex items-center justify-space-between px-10 py-10 w-100  md:px-25 lg:px-40">
        <a href="#home" class="brand animatable">{{ $app_name }}</a>
        <div class="flex gap-15">
            <div class="d-none fs-8 gap-10 items-center md:d-flex nav-links">
                <a href="#home" class="">Home</a>
                <a href="#niceties" class="">Content</a>
                <a href="#features" class="">Features</a>
                <a href="#contact" class="">Contact</a>
            </div>
        </div>

        <a href="/admin" type="button" class="btn btn-primary-outline" aria-expanded="false">
            @auth
            Access
            @endauth

            @guest
            Log In
            @endguest
        </a>
    </section>

    {{-- Hero --}}
    <section
        class="lamp d-flex flex-column gap-row-10 hero items-center justify-space-between px-10 py-15 md:flex-row md:px-25 lg:px-40 md:py:20 lg:py-25"
        id="home">
        <div class="d-flex flex-column items-ceter-justify-space-between w-100 md:w-60 lg:w-70">
            <h1
                class="animatable fs-20 fw-900 lg:fs-24 lg:text-left lg:w-70 md:fs-22 md:text md:w-80 text-capitalize text-center w-100">
                Esential Information <span class="text-primary underlined">Made</span> Accessible
            </h1>
            <p class="w-100 fs-8 mt-4 color-black-light md:w-80 lg:w-70">
                We add value by providing with decision-Making information, on Timely and Useful ways.
            </p>
            <div class="flex justify-center mt-8 lg:justify-flex-start w-100 md:w-80 lg:w-7">
                <a href="/admin" class="btn btn-primary btn-lg animatable" data-animation="fade-in-left"
                    data-delay="0.25s">Get me in</a>
            </div>
        </div>

        {{-- <img class="mt-20 w-40 md:w-30 lg:w-20" src="{{ asset('images/main-header.gif') }}" alt="Header Image">
        --}}
        <div class="mt-20 w-40 md:w-30 lg:w-20">
            @include('layouts.partials.hero')
        </div>
    </section>

    {{-- Content --}}
    <section class="flex flex-column px-10 py-15 md:px-25 lg:px-40 md:flex-row md:py:20 lg:py-25" id="niceties">
        <div class="flex flex-column w-100 md:w-40 md:pr-20 lg:w-30">
            <h1 class="fs-16 fw-700 m-0 mb-15 p-0 text-center animatable text-capitalize md:text-left md:mb-0 md:pt-20">
                Out of the box
            </h1>
            <div class="d-none md:block mt-20 w-70 animatable">
                {{-- <img class="mt-20 w-70 w-70" src="{{ asset('images/niceties.png') }}" alt="Header Image"> --}}
                @include('layouts.partials.niceties')
            </div>

        </div>
        <div class="flex flex-column w-100 md:w-60 lg:w-70 first-card relative">
            <div class="flex flex-column items-center justify-center oob-card sm:flex-row animatable"
                data-animation="fade-in-right">
                <div class="w-100 sm:w-50 p-10">
                    <h5 class="fw-600 fs-10"> Dashboards <i class="fa fa-dashboard"></i></h5>
                    <p class="fs-6 mt-6">Lots of story telling infographics, featured with info cards, bar charts,
                        line
                        charts, pie charts,
                        combined charts, giving life and meaning to your Key Process Indicators.</p>
                </div>
                <img class="mt-4 w-80 sm:w-50 sm:pl-10" src="{{ asset('images/snapshots/hh_rr_dashboard.png') }}"
                    alt="Dashboard">
            </div>

            <div class="flex flex-column items-center justify-center oob-card sm:flex-row-reverse animatable"
                data-animation="fade-in-right">
                <div class="w-100 sm:w-50 p-10">
                    <h5 class="fw-600 fs-10"> Datatables <i class="fa fa-table"></i></h5>
                    <p class="fs-6 mt-6">Beatiful tables featured with data search, multi-column sorting,
                        pagination,
                        server side processing and more, without having to refresh the page.</p>
                </div>
                <img class="mt-4 w-80 sm:w-50 sm:pr-10" src="{{ asset('images/snapshots/tables.png') }}"
                    alt="Dashboard">
            </div>

            <div class="flex flex-column items-center justify-center oob-card sm:flex-row animatable"
                data-animation="fade-in-right">
                <div class="w-100 sm:w-50 p-10">
                    <h5 class="fw-600 fs-10"> Details <i class="fa fa-eye"></i></h5>
                    <p class="fs-6 mt-6">Pages with multiple details related to you data base records. Related
                        records
                        details, ability to create new records, edit or delete based on User Access Level Contro.
                    </p>
                </div>
                <img class="mt-4 w-80 sm:w-50 sm:pl-10" src="{{ asset('images/snapshots/details.png') }}" alt="Details">
            </div>
        </div>
    </section>

    {{-- Call to Action --}}
    <section class="cta bg-primary flex flex-column px-10 py-15 lg:px-40 md:px-25 sm:flex-row md:py:20 lg:py-25"
        id="cta">
        <div class="align-center flex flex-column justify-center w-100 md:w-60 sm:align-flex-start sm:w-70 animatable">
            <h5 class="fs-16 fw-700 m-0">
                {{ $app_name }} <i class="fa fa-star"></i>
            </h5>
            <p class="mt-8 w-100 lg:w-70 md:w-60 ">
                Process documentation? Collect data? Customize reports? Just ask for it. Get in contact with the
                System Administrator and together create very useful components.
            </p>
            <div class="mt-12">
                <a href="/admin" class="btn btn-default btn-lg">
                    Go For It
                </a>
            </div>
        </div>
        <div class="d-none w-100 md:w-30 sm:d-block sm:w-30 cta-illustration">

        </div>
    </section>

    {{-- Features --}}
    <section class="flex flex-column px-10 py-10 gap-10 md:px-25 lg:px-40 md:py:20 lg:py-25" id="features">
        <h1 class="fs-16 fw-700 text-center animatable" data-animation="fade-in-right">Features</h1>
        <div
            class="align-center animatable flex flex-column gap-0 justify-center sm:gap-column-6 md:align-baseline md:flex-row md:justify-flex-start">
            @foreach ($features->split(2) as $features_chunk)
            <div class="w-100 md:w-50 m-0 p-0">
                @foreach ($features_chunk as $feature)
                <div class="card">
                    <div class="card-body">
                        <div class="card-icon fs-12">
                            {!! $feature['icon'] !!}
                        </div>
                        <div class="ml-8">
                            <h5 class="fs-8 fw-700">{{ $feature['title'] }}</h5>
                            <p>{{ $feature['text'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>

    {{-- Footer --}}
    <section
        class="flex flex-column footer px-10 py-15 md:px-25 lg:align-flex-start lg:flex-row lg:justify-space-between lg:px-40 lg:gap-30 md:py:20 lg:py-25"
        id="contact">
        <div class="align-flex-start flex flex-row justify-space-between lg:w-50">
            <div class="align-flex-start flex flex-column">
                <h2 class="text-center fw-700 text-uppercase fs-10 m-0 p-0">{{ $app_name }}</h2>
                <p class="w-70 md:w-80 lg:w-100 mt-5">
                    <strong>
                        Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2016-{{ date('Y') }}
                    </strong> All rights reserved!
                </p>
            </div>
            <div class="flex align-flex-end flex-column lg:align-flex-start">
                <h5 class="fs-10 fw-700 m-0 p-0 mb-4">Yismen Jorge</h5>
                <a href="tel:+1-829-521-3304" class="flex footer-link gap-4 items-center" target="__new">
                    <i class="fa fa-phone"></i>
                    1-829-521-3304
                </a>
                <a href="mailto:yismen.jorge@gmail.com" class="flex footer-link gap-4 items-center" target="__new">
                    <i class="fa fa-phone"></i>
                    yismen.jorge@gmail.com
                </a>

                <div class="flex mt-8 gap-8">
                    <a target="__new" href="https://github.com/yismen" class="social-icon">
                        <i class="fa fa-github"></i>
                    </a>
                    <a target="__new" href="#" class="social-icon">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a target="__new" href="https://www.facebook.com/yismen.jorge32" class="social-icon">
                        <i class="fa fa-facebook-square">
                        </i></a>
                    <a target="__new" href="https://wa.me/18295213304?text=Hi!" class="social-icon">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="align-flex-start flex flex-row justify-space-between lg:w-50 mt-16 lg:mt-0">
            <div class="flex flex-column w-50 text-left">
                <h5 class="fs-8 fw-700 m-0 p-0 mb-2">Highlights</h5>
                <a target="__new" href="/admin" class="footer-link">Admin Page</a>
                <a target="__new" href="/admin/employees" class="footer-link">Employees</a>
                <a target="__new" href="/telescope" class="footer-link">Telescope</a>
                <a target="__new" href="/docs" class="footer-link">API Docs</a>
                <a target="__new" href="/log-viewer" class="footer-link">Log Viewer</a>
                <a target="__new" href="https://storyset.com/web" class="footer-link">Web illustrations by Storyset</a>
            </div>
            <div class="flex flex-column text-right w-50 lg:text-left">
                <h5 class="fs-8 fw-700 m-0 p-0 mb-2">Resources</h5>
                <a target="__new" href="https://laravel.com/docs" class="footer-link">Laravel</a>
                <a target="__new" href="https://laravel-livewire.com/docs" class="footer-link">Livewire</a>
                <a target="__new" href="https://laravel-excel.com/" class="footer-link">Laravel Excel</a>
                <a target="__new" href="https://getbootstrap.com/docs/3.4/" class="footer-link">Bootstrap</a>
                <a target="__new" href="https://v2.vuejs.org/" class="footer-link">Viewjs</a>
                <a target="__new" href="https://adminlte.io/" class="footer-link">AdminLTE</a>
                <a target="__new" href="https://fontawesome.com/v4/icons/" class="footer-link">Font Awesome</a>
            </div>
        </div>
    </section>
</div>
@endsection

{{-- [
'title' => 'Authentication',
'text' => 'Some parts of the application are for the public to see, but sensitive data in restricted to authenticated
users only.',
'icon' => '<i class="fa fa-users"></i>',
],
[
'title' => 'Roles Access Level',
'text' => 'Grant access based on user roles. Show only relevant and pertinent information for the current user while
protecting sensitive data.',
'icon' => '<i class="fa fa-id-card"></i>',
],
[
'title' => 'Permissions Resctrictions',
'text' => 'Restrict access to perform actions with the data based on user permissions. You may be able to view data, but
not to edit it.',
'icon' => '<i class="fa fa-key"></i>',
],
[
'title' => 'User Notifications And Emails',
'text' => 'Be notified when certain events hapen in the application. Subscribe to reports and channels and receive
emails or notifications regularly.',
'icon' => '<i class="fa fa-bell"></i>',
],
[
'title' => 'Scheduled Tasks and Reports',
'text' => 'We can create tasks to be run in the application and reports to be sent out automatically at desired dates
and time.',
'icon' => '<i class="fa fa-tasks"></i>',
],
[
'title' => 'File downlaods',
'text' => 'Configure what fields should be included and download your updated data any time.',
'icon' => '<i class="fa fa-download"></i>',
], --}}