@inject('layout', 'App\Models\Layout')
@extends('layouts.'.$layout->site(), ['page_header'=>'Home', 'page_description'=>'Home page!',
'hide_content_header'=>false])

@section('content')
    <div class="site">
        <div class="navbar-default navbar-fixed-top d-flex items-center justify-space-between px-10 py-10 w-100  md:px-25 lg:px-40">
            <a href="#home" class="brand animatable">{{ $app_name }}</a>
            <div class="flex gap-15">
                <div class="d-none fs-8 gap-10 items-center md:d-flex nav-links">
                    <a href="#about" class="">About</a>
                    <a href="#features" class="">Features</a>
                    <a href="#contact" class="">Contact</a>
                </div>
                
                <a href="/admin" type="button" class="btn bg-secondary"  aria-expanded="false">
                    @auth
                        Access
                    @endauth

                    @guest
                        Log In
                    @endguest
                </a>
            </div>
        </div>
    
        <section class="d-flex flex-column gap-row-10 hero items-center justify-space-between px-10 py-15 md:flex-row md:px-25 lg:px-40" id="home">
            <div class="elements d-flex flex-column items-ceter-justify-space-between w-100 md:w-60 lg:w-70">
                <h1 class="w-100 fs-16 fw-700 text-center lg:fs-22 md:fs-20 md:text md:fw-900 lg:text-left md:w-80 lg:w-70 animatable">Esential Accessible Information</h1>
                <p class="w-100 fs-8 letter-spacing-2 mt-4 color-black-light md:w-80 lg:w-70 animatable" data-delay="0.5s">
                We add value by providing with decision-Making information, on Timely and Useful ways.
                </p>
                <div class="flex justify-center mt-8 lg:justify-flex-start w-100 md:w-80 lg:w-7">
                    <a href="/admin" class="btn btn-primary btn-lg animatable" data-animation="fade-in-left" data-delay="0.25s">Get me in</a>
                </div>
            </div>
    
            <img class="mt-20 w-50 md:w-40 lg:w-30" src="{{ asset('images/main-header.png') }}" alt="Header Image" >
        </section>

        <section class="flex flex-column px-10 py-15 md:px-25 lg:px-40" id="about">            
            <h1 class="fs-16 fw-700 text-center animatable">We are about Efficiency</h1>
            <div class="flex flex-column gap-40 mt-8 px-50 sm:px-0 py-15 sm:flex-row sm:gap-5 lg:gap-13 md:gap-10">
                <div class="card animatable" data-animation="fade-in-up">
                    <img class="card-image" src="{{ asset('images/snapshots/hh_rr_dashboard.png') }}" alt="Dashboard">
                    <div class="card-header">
                        Dashboards <i class="fa fa-dashboard"></i> 
                    </div>
                    <div class="card-body px-0 md:px-5 pb-3">
                        Lots of story telling infographics, featured with info cards, bar charts, line charts, pie charts, combined charts, giving life and meaning to your Key Process Indicators.
                    </div>
                </div>
                
                <div class="card animatable" data-animation="fade-in-left">
                    <img class="card-image" src="{{ asset('images/snapshots/tables.png') }}" alt="Datatables">
                    <div class="card-header">
                        Datatables <i class="fa fa-table"></i>
                    </div>
                    <div class="card-body px-0 md:px-5 pb-3">
                        Beatiful tables featured with data search, multi-column sorting, pagination, server side processing and more, without having to refresh the page.
                    </div>
                </div>

                <div class="card animatable" data-animation="fade-in-right">
                    <img class="card-image" src="{{ asset('images/snapshots/details.png') }}" alt="Details">
                    <div class="card-header">
                        Details <i class="fa fa-eye"></i>
                    </div>
                    <div class="card-body px-0 md:px-5 pb-3">
                        Pages with multiple details related to you data base records. Related records details, ability to create new records, edit or delete based on User Access Level Control.
                    </div>
                </div>
            </div>            
        </section>

        <section class="flex flex-column px-10 py-10 md:px-25 lg:px-40 gap-10" id="features">            
            <h1 class="fs-16 fw-700 text-center animatable" data-animation="fade-in-right">Right out of the box</h1>
            <div class="align-center flex flex-column justify-center sm:flex-row-reverse gap-10 decorated-right animatable">
                <div class="w-100 sm:w-50">
                    <h2 class="fs-9 fw-700">Features</h2>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fa fa-angle-double-right"></i> Authentication
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-double-right"></i> Roles Access Level
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-double-right"></i> Permissions Check
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-double-right"></i> Notifications
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-double-right"></i> Scheduled Reports
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-double-right"></i> Automatic Tasks
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-angle-double-right"></i> Downloads
                        </li>
                    </ul>
                </div>
                <div class="w-100 sm:w-50 animatable">
                    <img src="{{ asset('images/snapshots/image1.png') }}" class="w-100" alt="">
                </div>
            </div>
                
            <div class="align-center flex flex-column justify-center sm:flex-row gap-10 decorated-left animatable">
                <div class="w-100 sm:w-50">
                    <h2 class="fs-9 fw-700"> 
                        {{ $app_name }} <i class="fa fa-star"></i>
                    </h2>
                    <p class="">
                        Process documentation? Collect data? Customize reports? Just ask for it. Get in contact with the System Administrator and together create very useful components.
                    </p>
                    <div class="">
                        <a href="/admin" class="btn btn-primary btn-lg">
                            Go For It
                        </a>
                    </div>
                </div>
                <div class="w-100 sm:w-50 animatable">
                    <img src="{{ asset('images/snapshots/image2.png') }}" class="w-100" alt="">
                </div>
            </div>            
        </section>

        <section class="flex flex-column footer gap-10 mt-8 px-10 py-15 lg:px-40 md:flex-row md:px-25" id="contact">
            <div class="flex flex-column items-center justify-center self-center w-80 md:items-flex-start md:justify-flex-start md:w-40 md:self-flex-start">
                <h2 class="text-center fw-700 text-uppercase fs-10 m-0 p-0">{{ $app_name }}</h2>
                <p class="w-70 md:w-100 mt-5">
                    Process documentation? Collect data? Customize reports? Just ask for it. Get in contact with the System Administrator and together create very useful components.
                </p>
            </div>
            <div class="flex flex-row justify-space-between self-center w-80 md:w-30 md:self-flex-start">
                <div class="flex flex-column w-50 text-left">
                    <h5 class="fs-8 fw-700">Highlights</h5>
                    <a target="__new" href="/admin" class="footer-link">Admin Page</a>
                    <a target="__new" href="/admin/employees" class="footer-link">Employees</a>
                    <a target="__new" href="/telescope" class="footer-link">Telescope</a>
                    <a target="__new" href="/docs" class="footer-link">API Docs</a>
                    <a target="__new" href="/log-viewer" class="footer-link">Log Viewer</a>
                </div>
                <div class="flex flex-column text-right w-50 md:text-left">
                    <h5 class="fs-8 fw-700">Resources</h5>
                    <a target="__new" href="https://laravel.com/docs" class="footer-link">Laravel</a>
                    <a target="__new" href="https://laravel-livewire.com/docs" class="footer-link">Livewire</a>
                    <a target="__new" href="https://laravel-excel.com/" class="footer-link">Laravel Excel</a>
                    <a target="__new" href="https://getbootstrap.com/docs/3.4/" class="footer-link">Bootstrap</a>
                    <a target="__new" href="https://v2.vuejs.org/" class="footer-link">Viewjs</a>
                    <a target="__new" href="https://adminlte.io/" class="footer-link">AdminLTE</a>
                    <a target="__new" href="https://fontawesome.com/v4/icons/" class="footer-link">Font Awesome</a>
                </div>
            </div>
            <div class="flex flex-row justify-space-between self-center w-80 md:flex-column md:gap-10 md:w-30 md:self-flex-start">
                <div class="flex flex-column">
                    <h5 class="fs-10 fw-700 ">Yismen Jorge</h5>
                    <a href="tel:+1-829-521-3304" class="flex footer-link gap-4 items-center">
                        <i class="fa fa-phone"></i>
                        1-829-521-3304
                    </a>
                    <a href="mailto:yismen.jorge@gmail.com" class="flex footer-link gap-4 items-center">
                        <i class="fa fa-phone"></i>
                        yismen.jorge@gmail.com
                    </a>

                    <div class="flex mt-4 gap-8">
                        <a href="" class="social-icon"><i class="fa fa-github"></i></a>
                        <a href="" class="social-icon"><i class="fa fa-instagram"></i></a>
                        <a href="" class="social-icon"><i class="fa fa-facebook-square"></i></a>
                        <a href="" class="social-icon"><i class="fa fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="flex flex-column">
                    <strong>
                        Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2016-{{ date('Y') }}
                    </strong> All rights reserved!
                </div>
            </div>
        </section>
    </div>
@endsection
