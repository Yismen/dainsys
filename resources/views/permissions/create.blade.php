@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Permissions', 'page_description'=>'Create a new permission for your app.'])

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h4>
							New Permission
							<a href="{{ route('admin.permissions.index') }}" class="float-right">
								<i class="fa fa-list"></i> List
							</a>
						</h4>
					</div>

					{!! Form::open(['route'=>['admin.permissions.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}
						<div class="card-body">

							@include('permissions._form')

						</div>

						<div class="card-footer">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-primary">CREATE</button>
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