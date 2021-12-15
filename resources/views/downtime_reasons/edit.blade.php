@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config('dainsys.app_name'), 'page_description'=>'Edit Downtime Reason ' . $downtime_reason->name])

@section('content')
	<div class="col-sm-8 col-sm-offset-2">
		<div class="card card-primary card-outline">
			<div class="card-header with-border">
				<h4>
					Edit Reason For Downtime {{ $downtime_reason->name }}
					<a href="{{ route('admin.downtime_reasons.index') }}" class="float-right" title="Return to the List">
						<i class="fa fa-home"></i>
					</a>
				</h4>
			</div>

			<div class="card-body">
				{!! Form::model($downtime_reason, ['route'=>['admin.downtime_reasons.update', $downtime_reason->id], 'method'=>'PUT', 'class'=>'form-horizontal', 'role'=>'form']) !!}

					@include('downtime_reasons._form')

					<div class="col-sm-6 col-sm-offset-2">
						<button type="submit" class="btn btn-warning">
							<i class="fa fa-edit"></i>
							UPDATE
						</button>
					</div>

				{!! Form::close() !!}
			</div>

		</div>
	</div>

@stop

@push('scripts')

@endpush
