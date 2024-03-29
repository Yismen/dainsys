@extends('layouts.app', ['page_header'=>'Users', 'page_description'=>'User details.'])

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<div class="box box-primary pad">
				@if ($user)
				<div class="">
					<ul class="list-group">
						<li class="list-group-item">
							<strong>Name: </strong>{{ $user->name }}
						</li>
						<li class="list-group-item">
							<strong>Assigned to Roles: </strong>
							<br>
							@foreach ($user->roles as $role)
							<span class="label label-success">{{ $role->display_name }}</span>
							@endforeach
						</li>
						<li class="list-group-item">
							<strong>Username: </strong>{{ $user->username }}
						</li>
						<li class="list-group-item">
							<strong>Email: </strong>{{ $user->email }}
						</li>
						<li class="list-group-item {{ $user->is_active ? 'text-success' : '' }}">
							<strong>Status: </strong>{{ $user->is_active ? 'Active User' : 'This user is not active' }}
						</li>
						<li class="list-group-item {{ $user->is_admin ? 'text-warning' : '' }}">
							<strong>Is Admin?: </strong>{{ $user->is_admin ? 'Yes, this user is admin' : 'No admin' }}
						</li>
					</ul>
					<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"> Edit </a>
					{{-- {!! delete_button('users.destroy', $user->username, ['class'=>"btn btn-danger", 'label' =>
					'Delete']) !!} --}}
					<hr>
					<a href="{{ route('admin.users.index') }}" class="">
						<< Return to Users List </a>
				</div>
				{{-- /. Row --}}
				@else
				{{-- false expr --}}
				@endif
			</div>
		</div>
	</div>
</div>
@stop

@push('scripts')

@endpush