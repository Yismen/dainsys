@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->site(), ['page_header'=>'Home', 'page_description'=>'Home page!',
'hide_content_header'=>false])

@section('content')
<div class="bg-white">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <div class="flex justify-center">        
        <img src="{{ asset('images/eclipse_icon.png') }}" alt="Eclipse Icon" class="eclipse-icon">
        <a  href="#sections" class="btn btn-primary btn-link more-button w-60 animatable"  data-animation="from-top" data-delay="0.9s">
            <i class="fa fa-angle-double-down"></i> More
        </a> 
        <img src="{{ asset('images/eclipse.png') }}" alt="Eclipse" class="eclipse w-20 animatable" data-delay="0.35s" data-duration="1s">
        <img src="{{ asset('images/poligon.png') }}" alt="Poligon" class="poligon">
    </div>
    <div class="hero flex flex-row justify-center lg:justify-between lg:justify-space-between px-60">
        <div class="align-center border-bottom flex flex-column intro-heading justify-center lg:pr-70 m-0 main-header md:w-60 py-40 vh-90 w-100">
            <div class="align-center flex flex-column justify-between lg:align-flex-start px-20 pr-0 lg:px-0 lg:pr-30">
                <h1 class="fw-1000 text-primary text-uppercase main-title animatable" data-animation="fade-in-left">{{ $app_name }}</h1>
                <p class="mt-2 letter-spacing-2 animatable" data-animation="from-bottom-left" data-delay="0.25s">
                    Valuable, timely and on point information to aggregate value to your job.
                </p>
                <a href="/admin" class="btn btn-primary btn-lg mt-16 animatable">
                    <i class="fa fa-angle-double-right"></i> Get Started
                </a>
            </div>
        </div>

        <div class="intro-image md:flex justify-center align-center animatable">
            @include('icons.data-pana')
        </div>
    </div>
    
    <div id="sections" class="flex flex-column align-center gap-column-0 gap-row-5 justify-between justify-space-between lg:px-60 md:flex-row md:gap-column-10 md:gap-row-0 md:px-35 px-20 py-30">
        <div class="card md:w-100 px-10 py-15 text-center w-70">
            <div class="card-icon animatable" data-delay="0s">
                <img src="{{ asset('images/snapshots/hh_rr_dashboard.png') }}" class="img-rounded img-thumbnail" alt="Dashboards">
            </div>
            <div class="card-header animatable fs-10 fw-900 mt-12">
                <i class="fa fa-dashboard"></i> Dashboards
            </div>
            <div class="card-body animatable mt-8 text-muted text-left">
                Lots of story telling infographics, featured with info cards, bar charts, line charts, pie charts, combined charts, giving life and meaning to your Key Process Indicators.
            </div>
        </div>
        <div class="card md:w-100 px-10 py-15 text-center w-70">
            <div class="card-icon animatable" data-delay="0.2s">
                <img src="{{ asset('images/snapshots/tables.png') }}" class="img-rounded img-thumbnail" alt="Datatables">
            </div>
            <div class="card-header animatable fs-10 fw-900 mt-12">
                <i class="fa fa-table"></i> Datatables
            </div>
            <div class="card-body animatable mt-8 text-muted text-left">
                Beatifull tables featured with data search, multi-column sorting, pagination, server side processing and more, without having to refresh the page.
            </div>
        </div>
        <div class="card md:w-100 px-10 py-15 text-center w-70">
            <div class="card-icon animatable" data-delay="0.25s">
                <img src="{{ asset('images/snapshots/details.png') }}" class="img-rounded img-thumbnail" alt="Details">
            </div>
            <div class="card-header animatable fs-10 fw-900 mt-12">
                <i class="fa fa-eye"></i> Details
            </div>
            <div class="card-body animatable mt-8 text-muted text-left">
                Pages with multiple details related to you data base records. Related records details, ability to create new records, edit or delete based on User Access Level Control.
            </div>
        </div>
    </div>

    <div class="flex flex-column align-center gap-column-0 gap-row-5 justify-between justify-space-between lg:px-60 md:flex-row md:gap-column-10 md:gap-row-0 md:px-35 px-20 py-5 md:py-30">    
        <div class="align-center d-none justify-flex-center w-100 md:flex md:w-50 image-container animatable">
            @include('icons.data-amico')
        </div>    
        <div class="d-flex justify-center md:w-50 w-100">
            <div class="card w-70 md:w-100">
                <div class="card-header animatable fs-10 fw-900 text-center md:text-left py-10" data-animation="fade-in-up">
                    <i class="fa fa-list"></i> Features
                </div>

                <div class="card-body text-muted">
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
        </div>
    </div>
    
    <div class="flex flex-column align-center gap-column-0 gap-row-5 justify-between justify-space-between lg:px-60 md:flex-row md:gap-column-10 md:gap-row-0 md:px-35 px-20 py-20 md:py-30">     
        <div class="d-flex justify-center md:w-50 w-100">
            <div class="card w-70 md:w-100">
                <div class="card-header animatable fs-10 fw-900 text-center md:text-left py-10" data-animation="fade-in-up">
                    <i class="fa fa-star"></i> Dainsys
                </div>

                <div class="card-body px-10 py-20">
                    <p class=" text-muted animatable" data-animation="fade-in-right">
                        Process documentation? Collect data? Customize reports? Just ask for it. Get in contact with the System Administrator and together create very useful components.
                    </p>
                    <div class="text-center md:text-left">
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
        </div>  
        <div class="align-center d-none justify-flex-center w-100 md:flex md:w-50 image-container animatable">
            @include('icons.extraction-pana')
        </div> 
    </div>
</div>
@endsection
