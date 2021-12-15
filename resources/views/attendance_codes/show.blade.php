@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Sites', 'page_description'=>'Details.'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="card card-info">
                    <div class="card-header">
                        <h4>
                            {{ $site->name }} Details
                            <a href="{{ route('admin.sites.index') }}" class="float-right">
                                <i class="fa fa-home"></i> List
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        {{ $site }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush