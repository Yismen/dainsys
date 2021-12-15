@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Positions', 'page_description'=>'Create a new position.'])

@section('content')
	<div class="container-fluid">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="card card-success">
				<div class="card-header with-border">
					<h4>
						Adding a New Position
						<a href="{{ route('admin.positions.index') }}" class="float-right" title="Back to the list"><i class="fa fa-list"></i></a>
					</h4>
				</div>
				{!! Form::open(['route'=>['admin.positions.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}
					<div class="card-body">
						@include('positions._form')
					</div>

					<div class="card-footer">
						<div class="col-sm-10 col-sm-offset-2">
							<button type="submit" class="btn btn-primary">CREATE</button>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>

	</div>

@stop

@push('scripts')

@endpush
