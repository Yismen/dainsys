@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Departments', 'page_description'=>'Edit department\'s details'])

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="card card-primary card-outline">
					<div class="card-header with-border">
						<h4>
							Edit HH RR Department [{{ $department->name }}]
							<a href="{{ route('admin.departments.index') }}" class="float-right">
								<i class="fa fa-home"></i> List
							</a>
						</h4>
					</div>

					<div class="card-body">
						{!! Form::model($department, ['route'=>['admin.departments.update', $department->id], 'class'=>'form-horizontal', 'method'=>'PUT', 'role'=>'form']) !!}

							@include('departments._form')

						{!! Form::close() !!}
					</div>

					<div class="card-footer">
						<delete-request-button
						    url="{{ route('admin.departments.destroy', $department->id) }}"
						    redirect-url="{{ route('admin.departments.index') }}"
						></delete-request-button>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop