@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Import Perforces Data', 'page_description'=>'description'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="card card-primary card-outline">

                    <div class="card-body">
                        {!! Form::open(['route'=>['admin.imports.performances'], 'files' => true, 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>"off"]) !!}

                           <div class="card-header with-border"><h4>Import Perforces Data</h4></div>

                            @include('imports._form')

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">SUBMIT</button>
                                <button type="submit" class="btn btn-secondary">CANCEL</button>
                            </div>

                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
