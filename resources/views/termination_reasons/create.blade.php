@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config("dainsys.app_name"), 'page_description'=>'Create Termination Reasons'])

@section('content')
    <div class="container-fluid">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="card card-primary card-outline">
                <div class="card-header with-border">
                    <h4>    
                        Create New Termination Reason
                        <a href="{{ route('admin.termination_reasons.index') }}" title="Return to List" class="float-right"><i class="fa fa-home"></i></a>
                    </h4>
                </div>

                <form action="{{ route('admin.termination_reasons.store') }}" method="POST">
                    <div class="card-body">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        
                       @include('termination_reasons._form')
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">CREATE</button>
                        <button type="reset" class="btn btn-secondary">RESET</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush