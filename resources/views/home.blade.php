@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->site(), ['page_header'=>'Home', 'page_description'=>'Home page!',
'hide_content_header'=>false])

@section('content')
<div class="bg-white">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <div class="intro-header">
        <div class="flex flex-column justify-center m-0 main-header md:vh-90 md:w-40 px-20 py-40 text-white w-100">
            <h1 class="app-title fw-900">{{ $app_name }}</h1>
            <p class="lead letter-spacing-2 md:letter-spacing-3">Valuable, timely and on point information to aggregate value to your job.</p>
            {{-- <dainsys-logo default-animation="shake" class="logo my-30 md:invisible" class="hidden-sm"
                logo="{{ asset('images/logo.png') }}" 
                :random-animation="true"
                >
            </dainsys-logo> --}}
            <div>
                <a class="btn btn-lg btn-warning text-center call-to-action mt-92 md:mt-30"  data-animation="from-bottom" href="/admin" role="button" >
                    <i class="fa fa-sign-in"></i> Get Started!
                </a>
            </div>
            <a  href="#features" class="more-button "  data-animation="from-bottom">
                <i class="fa fa-angle-double-down"></i> More
            </a>
        </div>
    </div>

    <div class="container-fluid" id="features">
        <div class="flex flex-column md:flex-row">
            
            <div class="md:w-50 w-100">
                <div class="px-15 py-20 md:py-15">
                    <h2 class="fw-700">
                    <i class="fa fa-bars"></i> Features
                    </h2>
                    <p class="mt-4 text-muted" style="
                    font-stretch: ultra-expanded;
                    line-height: 2.25rem;
                ">
                <ul class="list-group">
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
            </p>
                </div>
            </div>
            <div class="md:w-50 w-100 invisible md:visible">
                <div class="h-100" style="background-image: url({{ asset('images/snapshots/data-amico.png') }}); 
                    background-position: left top;
                    background-repeat: no-repeat;
                    background-size: cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="dashboards">
        <div class="flex flex-column md:flex-row-reverse">
            
            <div class="md:w-50 w-100">
                <div class="px-15 py-20 md:py-45">
                    <h2 class="fw-700">
                    <i class="fa fa-dashboard"></i> Dashboards
                    </h2>
                    <p class="mt-4 text-muted" style="
                    font-stretch: ultra-expanded;
                    line-height: 2.25rem;
                ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem soluta at esse excepturi sed quaerat maiores placeat? Distinctio commodi consequatur molestias inventore nulla numquam provident accusamus dolore. Aut, tempora voluptas.</p>
                </div>
            </div>
            <div class="md:w-50 w-100 invisible md:visible">
                <div class="h-100" style="background-image: url({{ asset('images/snapshots/hh_rr_dashboard.png') }}); 
                    background-position: left top;
                    background-repeat: no-repeat;
                    background-size: cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="datatables">
        <div class="flex flex-column md:flex-row">
            
            <div class="md:w-50 w-100">
                <div class="px-15 py-20 md:py-45">
                    <h2 class="fw-700">
                    <i class="fa fa-table"></i> Datatables
                    </h2>
                    <p class="mt-4 text-muted" style="
                    font-stretch: ultra-expanded;
                    line-height: 2.25rem;
                ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem soluta at esse excepturi sed quaerat maiores placeat? Distinctio commodi consequatur molestias inventore nulla numquam provident accusamus dolore. Aut, tempora voluptas.</p>
                </div>
            </div>
            <div class="md:w-50 w-100 invisible md:visible">
                <div class="h-100" style="background-image: url({{ asset('images/snapshots/tables.png') }}); 
                    background-position: left top;
                    background-repeat: no-repeat;
                    background-size: cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="details">
        <div class="flex flex-column md:flex-row-reverse">
            
            <div class="md:w-50 w-100">
                <div class="px-15 py-20 md:py-45">
                    <h2 class="fw-700">
                    <i class="fa fa-eye"></i> Record Details
                    </h2>
                    <p class="mt-4 text-muted" style="
                    font-stretch: ultra-expanded;
                    line-height: 2.25rem;
                ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem soluta at esse excepturi sed quaerat maiores placeat? Distinctio commodi consequatur molestias inventore nulla numquam provident accusamus dolore. Aut, tempora voluptas.</p>
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
                    <h2 class="fw-700">
                    <i class="fa fa-star"></i> Dainsys
                    </h2>
                    <p class="mt-4" style="
                        font-stretch: ultra-expanded;
                        line-height: 2.25rem;
                    ">Process documentation? Collect data? Customize reports? Just ask for it. Get in contact with the
            System Administrator and together create very useful components.</p>                
                    <div>
                        <a
                            href="/admin"
                            data-animation="from-bottom"
                            class="btn btn-primary btn-lg fw-700 from-bottom mt-8"
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
