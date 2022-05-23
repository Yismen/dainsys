@inject('layout', 'App\Models\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Menus', 'page_description'=>'List of Menu Items'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="box box-primary">
                    {!! Form::open(['route'=>['admin.menus.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}

                        <div class="box-header with-border">
                            <h4>
                                New Menu Item                                
                                <a href="{{ route('admin.menus.index') }}" class="pull-right">
                                    <i class="fa fa-home"></i>
                                        Return to List
                                </a>
                            </h4>
                        </div>            
                        
                        <div class="box-body">
                            @include('menus._form')
                        </div>
                        
                        <div class="box-footer">
                            <div class="form-group">
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