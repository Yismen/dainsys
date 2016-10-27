@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Users', 'page_description'=>'Edit user information and config.'])

@section('content')
	<div class="container ">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="box box-primary pad">
				<div class="row">
					<div class="col-sm-12">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum ex repellendus cum, soluta ea tempore voluptas voluptatum, hic asperiores quo reprehenderit ducimus dolorum voluptatem commodi ut aliquid, nostrum rerum consequatur?
						{!! Form::model($user, ['route'=>['admin.users.update', $user->id], 'method'=>'PUT', 'class'=>'form-horizontal', 'role'=>'form']) !!}		
							<div class="form-groups">
								<legend>
									Edit user - {{ $user->name }}
									<a href="{{ route('admin.users.index') }}" class="pull-right"><i class="fa fa-list"></i></a>
								</legend>
							</div>
						
							@include('users._form')
							<hr>
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<button type="submit" class="btn btn-primary form-control">Save</button>
								</div>
							</div>
						
						{!! Form::close() !!}
						<hr>

							<div class="col-sm-10 col-sm-offset-1">
						<div class="form-group">
								<form action="{{ url('/admin/users', $user->id) }}" method="POST" class="" style="display: inline-block;">
								    {!! csrf_field() !!}
								    {!! method_field('DELETE') !!}
								
								    <button type="submit" id="delete-user" class="btn btn-danger"  name="deleteBtn">
								        <i class="fa fa-btn fa-trash"></i> Delete User
								    </button>
								</form>
							</div>
						</div>
					</div>
				</div>


						
			</div>
		</div>

	</div>
@stop

@section('scripts')
	
@stop