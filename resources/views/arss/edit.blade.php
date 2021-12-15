@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'ARS', 'page_description'=>__('Edit'). ' ARS'])

@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        <div class="card card-primary card-outline">

            <div class="card-header with-border">
                <h4>
                    {{ __('Edit') }} ARS - {{ $ars->name }}
                    <a href="{{ route('admin.arss.index') }}" class="float-right">
                        <i class="fa fa-home"></i> {{ __('List') }}
                    </a>
                </h4>
            </div>


            {!! Form::model($ars, ['route'=>['admin.arss.update', $ars->id], 'method'=>'PATCH', 'class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>"off"]) !!}
                <div class="card-body">

                    @include('arss._form')

                </div>

                <div class="card-footer">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-warning text-uppercase">{{ __('Update') }}</button>
                    </div>
                </div>
            {!! Form::close() !!}

            <div class="card-footer">
                <delete-request-button
                    url="{{ route('admin.arss.destroy', $ars->id) }}"
                    redirect-url="{{ route('admin.arss.index') }}"
                ></delete-request-button>
            </div>

        </div>
    </div>
@stop

@push('scripts')

@endpush
