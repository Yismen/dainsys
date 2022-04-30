@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->site(), ['page_header'=>'Home', 'page_description'=>'Home page!',
'hide_content_header'=>false])

@section('content')
<div class="bg-white">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <div class="flex justify-center">        
        <img src="{{ asset('images/eclipse_icon.png') }}" alt="Eclipse Icon" class="eclipse-icon">
        <a  href="#features" class="btn btn-primary btn-link more-button w-60 animatable"  data-animation="from-top" data-delay="0.9s">
            <i class="fa fa-angle-double-down"></i> More
        </a> 
        <img src="{{ asset('images/eclipse.png') }}" alt="Eclipse" class="eclipse w-20 animatable" data-delay="0.35s" data-duration="1s">
        <img src="{{ asset('images/poligon.png') }}" alt="Poligon" class="poligon">
    </div>
    <div class="flex flex-row justify-center lg:justify-between lg:justify-space-between px-20">
        <div class="align-center border-bottom flex flex-column intro-heading justify-center lg:pr-70 m-0 main-header md:w-60 py-40 vh-90 w-100">
            <div class="align-center flex flex-column justify-between lg:align-flex-start px-20 pr-0 lg:px-0 lg:pr-30">
                <h1 class="fw-1000 text-primary text-uppercase main-title animatable" data-animation="fade-in-left">{{ $app_name }}</h1>
                <p class="mt-2 letter-spacing-2 animatable" data-animation="from-bottom-left" data-delay="0.25s">
                    Valuable, timely and on point information to aggregate value to your job.
                </p>
                <a href="/admin" class="btn btn-primary btn-lg mt-16">
                    <i class="fa fa-angle-double-right"></i> Get Started
                </a>
            </div>
        </div>

        <div class="intro-image md:flex justify-center align-center">
            <img src="{{ asset('images/main-header 2.png') }}" class="animatable h-60" alt="Main Header">
        </div>
    </div>

    <div class="container-fluid" id="features">
        <div class="flex flex-column md:flex-row">
            
            <div class="md:w-50 w-100">
                <div class="px-15 py-20 md:py-15">
                    <h2 class="fw-700 animatable" data-animation="fade-in-up" data-duration="0.75s">
                        <i class="fa fa-bars"></i> Features
                    </h2>
                    <ul class="list-group mt-4 animatable" data-animation="fade-in-left" data-delay="0.5s">
                        <li class="list-group-item">
                            <i class="fa fa-key"></i> Authentication
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-compass"></i> Roles Access Level
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-check-square"></i> Permissions Check
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-envelope"></i> Notifications
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-tasks"></i> Automatic Tasks
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-download"></i> Downloads
                        </li>
                    </ul>  
                </div>
            </div>
            <div class="md:w-50 w-100 invisible md:visible">
                <div
                  class="h-100"
                  style="background-image: url({{ asset('images/snapshots/data-amico.png') }}); background-position: left top; background-repeat: no-repeat; background-size: cover;"
                >
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="dashboards">
        <div class="flex flex-column md:flex-row-reverse">
            
            <div class="md:w-50 w-100 ">
                <div class="px-15 py-20 md:py-45">
                    <h2 class="fw-700 animatable" data-animation="from-bottom-left" data-delay="0.25s">
                        <i class="fa fa-dashboard"></i> Dashboards
                    </h2>
                    <p
                      class="mt-4 text-muted animatable"
                      data-animation="fade-in-up"
                      style=" font-stretch: ultra-expanded; line-height: 2.25rem; "
                    >
                      Lots of story telling infographics, featured with info cards, bar charts, line charts, pie charts, combined charts, giving life and meaning to your Key Process Indicators.
                    </p>
                </div>
            </div>
            <div class="md:w-50 w-100 invisible md:visible">
                <div
                  class="h-100"
                  style="background-image: url({{ asset('images/snapshots/hh_rr_dashboard.png') }}); background-position: left top; background-repeat: no-repeat; background-size: cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="datatables">
        <div class="flex flex-column md:flex-row">
            
            <div class="md:w-50 w-100" data-animation="fade-in-up">
                <div class="px-15 py-20 md:py-45">
                    <h2 class="fw-700 animatable" data-animation="from-right" data-delay="0.35s">
                        <i class="fa fa-table"></i> Datatables
                    </h2>
                    <p class="mt-4 text-muted animatable" style=" font-stretch: ultra-expanded; line-height: 2.25rem; ">
                        Beatifull tables featured with data search, multi-column sorting, pagination, server side processing and more, without having to refresh the page.
                    </p>
                </div>
            </div>
            <div class="md:w-50 w-100 invisible md:visible">
                <div
                  class="h-100"
                  style="background-image: url({{ asset('images/snapshots/tables.png') }}); background-position: left top; background-repeat: no-repeat; background-size: cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="details">
        <div class="flex flex-column md:flex-row-reverse">
            
            <div class="md:w-50 w-100" data-animation="fade-in-up">
                <div class="px-15 py-20 md:py-45 " data-animation="fade-in-down">
                    <h2 class="fw-700 animatable"  data-delay="0.35s" data-duration="0.85s">
                        <i class="fa fa-eye"></i> Record Details
                    </h2>
                    <p
                      class="mt-4 text-muted animatable"
                      data-animation="from-bottom-right"
                      data-delay="0.15s"
                      style=" font-stretch: ultra-expanded; line-height: 2.25rem; ">
                        Pages with multiple details related to you data base records. Related records details, ability to create new records, edit or delete based on User Access Level Control. 
                    </p>
                </div>
            </div>
            <div class="md:w-50 w-100 invisible md:visible">
                <div class="h-100" style="background-image: url({{ asset('images/snapshots/details.png') }}); 
                    background-position: left top;
                    background-repeat: no-repeat;
                    background-size: cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="action">
        <div class="flex flex-column md:flex-row">
            
            <div class="md:w-50 w-100">
                <div class="px-15 py-20 md:py-45">
                    <h2 class="fw-700 animatable" data-animation="fade-in-up">
                        <i class="fa fa-star"></i> Dainsys
                    </h2>
                    <p class="mt-4 animatable" data-animation="fade-in-down" data-delay="0.5s" style="
                        font-stretch: ultra-expanded;
                        line-height: 2.25rem;
                    ">Process documentation? Collect data? Customize reports? Just ask for it. Get in contact with the
            System Administrator and together create very useful components.</p>                
                    <div>
                        <a
                            href="/admin" 
                            data-animation="fade-in-down"
                            data-delay="0.5s"
                            data-duration="1s"
                            class="btn btn-primary btn-lg fw-700 from-bottom mt-8 animatable"
                            style="box-shadow: rgba(0, 0, 0, 0.5) -2px 2px 2px 0px; text-transform: uppercase; visibility: visible; font-weight: 700;"
                            >
                            <i class="fa fa-sign-in"></i> Go For It!
                        </a>  
                    </div>  
                </div>
            </div>
            <div class="md:w-50 w-100 invisible md:visible">
                <div class="h-100" style="background-image: url({{ asset('images/snapshots/extraction-cuate.png') }}); 
                    background-position: left top;
                    background-repeat: no-repeat;
                    background-size: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
