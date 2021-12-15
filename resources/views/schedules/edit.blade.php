@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Schedules', 'page_description'=>'Edit Schedule ID.'])

@section('content')
	<div class="container-fluid">
    	<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="card card-warning">

					<div class="card-header">
						<h4>
							Edit Schedule for Employee {{ $schedule->employee->fullName }} on date {{ $schedule->date->format('M-d-Y') }}, {{ $schedule->date->format('l') }}
							 <span class="label label-info">{{ strtoupper($schedule->day) }}</span>
							<a href="{{ route('admin.schedules.index') }}" class="float-right" title="Back To Schedules List">
								<i class="fa fa-list"></i>
							</a>
						</h4>
					</div>

					{!! Form::model($schedule, ['route'=>['admin.schedules.update', $schedule->id], 'method'=>'PUT', 'class'=>'form-horizontal', 'role'=>'form']) !!}

							<div class="card-body">
								<!-- Hours -->
								<div class="form-group row {{ $errors->has('hours') ? 'has-error' : null }}">
									{!! Form::label('hours', 'Hours:', ['class'=>'col-sm-2  col-form-label']) !!}
									<div class="col-sm-10">
										{!! Form::input('number', 'hours', null, ['class'=>'form-control', 'placeholder'=>'Hours', 'step' => 0.25]) !!}
										{!! $errors->first('hours', '<span class="text-danger">:message</span>') !!}
									</div>
								</div>
								<!-- /. Hours -->
							</div>

							<div class="card-footer">
								<div class="form-group row">
									<div class="col-sm-6 col-sm-offset-2">
										<button type="submit" class="btn btn-warning">UPDATE</button>
										<button type="reset" class="btn btn-secondary">Reset Form</button>
									</div>
								</div>
							</div>

							<div class="card-footer">
								<delete-request-button
								    url="{{ route('admin.schedules.destroy', $schedule->id) }}"
								    redirect-url="{{ route('admin.schedules.index') }}"
								></delete-request-button>
							</div>




						{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')

@endpush
