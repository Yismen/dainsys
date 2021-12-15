@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Logins', 'page_description'=>'Edit a login.'])

@section('content')
	<div class="container-fluid">
    	<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="card card-primary card-outline">
					<div class="card-header with-border">
						<h4>
							Edit Login {{ $login->login }}
							<a href="{{ route('admin.login_names.index') }}" class="float-right">
								<i class="fa fa-home"></i> List
							</a>

						</h4>
					</div>

					{!! Form::model($login, ['route'=>['admin.login_names.update', $login->id], 'method'=>'PUT', 'class'=>'form-horizontal', 'role'=>'form']) !!}

						<div class="card-body">
							@include('login_names._form')
						</div>

						<div class="card-footer">
							<div class="col-sm-10 col-sm-offset-2">
								<div class="form-group row">
									<button type="submit" class="btn btn-warning">UPDATE</button>
								</div>
							</div>
						</div>

					{!! Form::close() !!}

					<div class="card-footer">
		                <delete-request-button
		                    url="{{ route('admin.login_names.destroy', $login->id) }}"
		                    redirect-url="{{ route('admin.login_names.index') }}"
		                ></delete-request-button>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
