@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Roles Management', 'page_description'=>'Edit Roles to change their interaction with the system.'])

@section('content')
	<div class="container-fluid">
    	<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h4>
							Edit Role {{ $role->name }}
							<a
								href="{{ route('admin.roles.index') }}"
								class="float-right"
								title="Return to List"
							>
								<i class="fa fa-list"></i>
							</a>
						</h4>

					</div>
					{!! Form::model($role, ['route'=>['admin.roles.update', $role->name], 'method'=>'PUT', 'class'=>'form-horizontal', 'role'=>'form']) !!}
						<div class="card-body">
							@include('roles._form')
						</div>

						<div class="card-footer">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-primary form-control">Update</button>
							</div>
						</div>

					{!! Form::close() !!}

					<div class="card-footer">
						<div class="form-group row">
							<form action="{{ url('/admin/roles', $role->name) }}" method="POST" class="" style="display: inline-block;">
							    {!! csrf_field() !!}
							    {!! method_field('DELETE') !!}

							    <button type="submit" id="delete-role" class="btn btn-danger"  name="deleteBtn">
							        <i class="fa fa-btn fa-trash"></i> Delete Role
							    </button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')

@endpush
