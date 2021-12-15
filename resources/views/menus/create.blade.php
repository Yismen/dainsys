@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Menus', 'page_description'=>'List of Menu Items'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="card card-primary card-outline">
                    {!! Form::open(['route'=>['admin.menus.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}

                        <div class="card-header with-border">
                            <h4>
                                New Menu Item                                
                                <a href="{{ route('admin.menus.index') }}" class="float-right">
                                    <i class="fa fa-home"></i>
                                        Return to List
                                </a>
                            </h4>
                        </div>            
                        
                        <div class="card-body">
                            @include('menus._form')
                        </div>
                        
                        <div class="card-footer">
                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary form-control">Create</button>
                                    <br>
                                </div>
                            </div>

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush