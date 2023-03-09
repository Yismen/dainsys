@extends('layouts.app', ['page_header'=>'Ars', 'page_description'=>__('Add'). ' ARS'])

@section('content')
<div class="col-sm-8 col-sm-offset-2">
    <div class="box box-primary">

        <div class="box-header with-border">
            <h4>
                {{ __('Add') }} ARS
                <a href="{{ route('admin.arss.index') }}" class="pull-right">
                    <i class="fa fa-home"></i> {{ __('List') }}
                </a>
            </h4>
        </div>

        {!! Form::open(['route'=>['admin.arss.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form',
        'autocomplete'=>"off"]) !!}
        <div class="box-body">

            @include('arss._form')

        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary text-uppercase">{{ __('Create') }}</button>
            <button type="reset" class="btn btn-default">{{ __('Cancel') }}</button>
        </div>
        {!! Form::close() !!}

    </div>
</div>
@stop

@push('scripts')

@endpush