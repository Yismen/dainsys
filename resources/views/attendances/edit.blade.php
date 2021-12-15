@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config('dainsys.app_name'), 'page_description'=>'Edit Attendance '.$attendance->name])

@section('content')
	<div class="col-sm-8 col-sm-offset-2">
		<div class="card card-primary card-outline">
            <div class="card-header">
                <h4>
                    Edit Attendance for {{ $attendance->employee->full_name }}: 
                    <a href="{{ route('admin.attendances.index') }}" title="Back to list!" class="float-right">
                        <i class="fa fa-list"></i> List
                    </a>
                </h4>
            </div>

            {!! Form::model($attendance, ['route'=>['admin.attendances.update', $attendance->id], 'method'=>'PUT', 'class'=>'', 'role'=>'form']) !!}	
                <div class="card-body">
                    <label for="employee_id">{{ __('Employee Name') }}:</label>
                    <x-fields.select
                        field-name="employee_id"
                        :items="$attendance->employeesList->pluck('full_name', 'id')"
                    ></x-fields.select>   	
					@include('attendances._form')
                </div>

                <div class="card-footer">
                    <div class="col-sm-6 col-sm-offset-2">
						<button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> UPDATE</button>				
					</div>
                </div>
            {!! Form::close() !!}	

            <div class="card-footer">
                @component('components.delete-button', [
                    'url' => route('admin.attendances.destroy', $attendance->id),
                    'redirect' => route('admin.attendances.index')
                ])                    
                @endcomponent    
            </div>			
		</div>
	</div>

@stop

@push('scripts')
	
@endpush