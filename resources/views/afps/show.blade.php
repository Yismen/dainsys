@extends('layouts.app', ['page_header'=>'AFP', 'page_description'=>__('Details')])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="box box-primary pad">
                <div class="box-header with-border">
                    <h4>
                        {{ __('Details') }} - {{ $afp->name }}
                        <a href="{{ route('admin.afps.index') }}" class="pull-right">
                            <i class="fa fa-home"></i> {{ __('List') }}
                        </a>
                    </h4>
                </div>
                <div class="box-body">

                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-star"></i></span>

                        <div class="info-box-content">
                            <p class="info-box-text">
                                {{ $afp->name }}
                                <a href="{{ route('admin.afps.edit', $afp->id) }}"><i class="fa fa-pencil"></i></a>
                            </p>

                            <p class="m-0">ID: <strong> {{ $afp->id }}</strong></p>
                            <p class="m-0">{{ __('Employees') }}: <strong> {{ count($afp->employees) }}</strong></p>
                        </div>
                        <!-- /.info-box-content -->
                    </div>

                    @if(count($afp->employees))
                    <div class="table-responsive">
                        <strong>{{ __('Employees') }}</strong>
                        <table class="table table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Photo') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($afp->employees as $employee)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.employees.show', $employee->id) }}">{{ $employee->id
                                            }}</a>
                                    </td>
                                    <td>
                                        {{ $employee->full_name }}
                                    </td>
                                    <td class="col-xs-2">
                                        <a href="{{ asset($employee->photo) }}" target="_new">
                                            <img src="{{ asset($employee->photo) }}" height="30px" alt="Image">
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush