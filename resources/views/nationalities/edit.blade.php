@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config("dainsys.app_name"), 'page_description'=>'Edit Existing Nationality.'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="card card-primary card-outline">

                    {!! Form::model($nationality, ['route'=>['admin.nationalities.update', $nationality->id], 'method' => 'PUT', 'class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>"off",  'enctype'=>"multipart/form-data"]) !!}
                        <div class="card-header with-border">
                            <h4>
                                Edit Nationality {{ $nationality->name }}
                                <a href="{{ route('admin.nationalities.index') }}" class="float-right" title="Back to Main Page"><i class="fa fa-list"></i></a>
                            </h4>
                        </div>
                        {{-- /. .card-header --}}
                        <div class="card-body">
                            @include('nationalities._form')
                        </div>
                        {{-- /. .card-body --}}
                        <div class="card-footer">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-warning">UPDATE</button>
                                    <button type="reset" class="btn btn-secondary">CANCEL</button>
                                </div>
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