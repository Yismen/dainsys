@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Menus', 'page_description'=>'List of Menu Items'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <div class="card card-primary card-outline">
                    {!! Form::open(['route'=>['admin.shifts.store'], 'method'=>'POST', 'class'=>'', 'role'=>'form', 'novalidate' => true]) !!}

                        <div class="card-header with-border">
                            <h4>
                                New Menu Shift
                                <a href="{{ route('admin.shifts.index') }}" class="float-right">
                                    <i class="fa fa-home"></i>
                                        Return to List
                                </a>
                            </h4>
                        </div>

                        <div class="card-body">
                            @include('shifts._form')
                        </div>

                        <div class="card-footer">
                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
                {{-- .card --}}
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
