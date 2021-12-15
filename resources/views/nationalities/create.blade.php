@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config("dainsys.app_name"), 'page_description'=>'Create a new Nationality.'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="card card-primary card-outline">


                    {!! Form::open(['route'=>['admin.nationalities.store'], 'class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>"off",  'enctype'=>"multipart/form-data"]) !!}
                        <div class="card-header with-border">
                            <h4>
                                Add a New Nationality
                                <a href="{{ route('admin.nationalities.index') }}" class="float-right" title="Back to Main Page"><i class="fa fa-list"></i></a>
                            </h4>
                        </div>
                        {{-- /. .card-header --}}
                        <div class="card-body">
                            @include('nationalities._form')
                        </div>
                        {{-- /. .card-body --}}
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                            <button type="reset" class="btn btn-secondary">CANCEL</button>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush