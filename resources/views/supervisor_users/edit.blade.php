@extends('layouts.app', ['page_header'=>'Supervisor User Relationships', 'page_description'=>'Edit supervisor_user
item'])

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="box box-warning">
				<div class="box-header with-border">
					<h4>Edit Supervisor User Relationship
						{{-- {{ $assigned->name }} --}}
						<a href="{{ route('admin.supervisor_users.index') }}" class="pull-right">
							<i class="fa fa-home"></i>
							Return to List
						</a>
					</h4>
				</div>

				{!! Form::model($supervisor_user, ['route'=>['admin.supervisor_users.update', $supervisor_user->id],
				'method'=>'PUT', 'class'=>'', 'role'=>'form']) !!}

				<div class="box-body">
					@include('supervisor_users._form')
				</div>

				<div class="box-footer">
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-2">
							<button type="submit" class="btn btn-warning">UPDATE</button>
						</div>
					</div>
				</div>


				{!! Form::close() !!}

				<div class="box-footer">
					<delete-request-button url="{{ route('admin.supervisor_users.destroy', $supervisor_user->id) }}"
						redirect-url="{{ route('admin.supervisor_users.index') }}"></delete-request-button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')

@endpush