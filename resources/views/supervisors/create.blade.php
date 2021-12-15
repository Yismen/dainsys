@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Supervisors', 'page_description'=>'Create a new supervisor.'])

@section('content')
	<div class="container-fluid">
    	<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="card card-primary card-outline">
					{!! Form::open(['route'=>['admin.supervisors.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}
						<div class="card-header with-border">
							<h4>
								Add a New Supervisor
								<a href="{{ route('admin.supervisors.index') }}" class="float-right">
									<i class="fa fa-home"></i> List
								</a>
							</h4>
						</div>

						<div class="card-body">
							@include('supervisors._form')
						</div>

						<div class="card-footer">
							<div class="col-sm-12">
								<div class="form-group row">
									<button type="submit" class="btn btn-primary">Create</button>
								</div>
							</div>
						</div>

					{!! Form::close() !!}
				</div>
			</div>

			{{-- // errors --}}
		</div>

	</div>

@stop

@push('scripts')

@endpush
