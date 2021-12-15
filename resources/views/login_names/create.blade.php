@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Logins', 'page_description'=>'Create a new login.'])

@section('content')
	<div class="container-fluid">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="card card-primary card-outline">
				<div class="card-header with-border">
					<h4>
						New Login Name
						<a href="{{ route('admin.login_names.index') }}" class="float-right small">
							<i class="fa fa-home"></i> Back to List
						</a>
					</h4>
				</div>
				{!! Form::open(['route'=>['admin.login_names.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}

					<div class="card-body">
						@include('login_names._form')
					</div>

					<div class="card-footer">
						<div class="col-sm-offset-2">
							<button type="submit" class="btn btn-primary">CREATE</button>
						</div>
					</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
