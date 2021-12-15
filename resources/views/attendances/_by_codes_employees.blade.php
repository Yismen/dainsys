@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config('dainsys.app_name'), 'page_description'=>'Edit Attendance '])

@section('content')
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h4>
                    Search Employees by Codes:
                    <a href="{{ route('admin.attendances.code', $code->id) }}" class="float-right">
                        <i class="fa fa-tachometer-alt"></i> Dashboard
                    </a>
                </h4>
            </div>
            
            <div class="card-body" style="max-height: 200px; overflow-y: auto;">
                @foreach ($codes as $attendance_code)
                    @if ($attendance_code->id == $code->id)
                        <a href="#" class="btn btn-sm btn-primary">
                            {{ $attendance_code->name }}
                        </a>
                    @else
                    <a href="{{ route('admin.attendances.code.employees', $attendance_code->id) }}" 
                        class="btn btn-sm btn-secondary">
                        {{ $attendance_code->name }}
                    </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="col-lg-3 col-xs-6">
            @include('attendances._code_employee', [
                'title' => "Employees $code->name This Week!",
                    'color' => 'bg-blue',
                    'code' => $code->id,
                    'employees' => $data['this_week']
                ])
            </div>
            <div class="col-lg-3 col-xs-6">
                @include('attendances._code_employee', [
                    'title' => "Employees $code->name Last Week!",
                    'color' => 'bg-blue',
                    'employees' => $data['last_week']
                ])
            </div>
            <div class="col-lg-3 col-xs-6">
                @include('attendances._code_employee', [
                    'title' => "Employees $code->name This Month!",
                    'color' => 'bg-green',
                    'employees' => $data['this_month']
                ])
            </div>
            <div class="col-lg-3 col-xs-6">
                @include('attendances._code_employee', [
                    'title' => "Employees $code->name Last Month!",
                    'color' => 'bg-green',
                    'employees' => $data['last_month']
                ])
            </div>
            <div class="col-lg-3 col-xs-6">
                @include('attendances._code_employee', [
                    'title' => "Employees $code->name Two Months Ago!",
                    'color' => 'bg-green',
                    'employees' => $data['two_months_ago']
                ])
            </div>
        </div>
    </div>
@stop

@push('scripts')
	
@endpush