@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config("dainsys.app_name"), 'page_description'=>'Create Termination Types'])

@section('content')
    <div class="container-fluid">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="card card-primary card-outline">
                <div class="card-header with-border">
                    <h4>
                        Edit Termination Type {{ $termination_type->name }}
                        <a href="{{ route('admin.termination_types.index') }}" title="Return to List" class="float-right"><i class="fa fa-home"></i></a>
                    </h4>
                </div>

                <div class="card-body">
                    {!! Form::model($termination_type, ['route'=>['admin.termination_types.update', $termination_type->id], 'method'=>'PUT', 'role'=>'form', 'autocomplete'=>"off",  'enctype'=>"multipart/form-data"]) !!}

                       @include('termination_types._form')

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">SAVE</button>
                            <button type="reset" class="btn btn-secondary">RESET</button>
                        </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
