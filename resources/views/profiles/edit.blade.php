@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="card card-warning">
					<div class="card-header with-border">
						<h4>
							Update Your Profile
							<a href="{{ route('admin.profiles.index') }}" class="float-right" title="Return to Your Profile">
								<i class="fa fa-arrow-circle-left"></i> Home
							</a>
						</h4>
					</div>

					{!! Form::model($profile, ['route'=>['admin.profiles.update', $profile->id], 'method'=>'PUT',  'class'=>'', 'role'=>'form', 'autocomplete'=>"off", 'files' => true]) !!}

						<div class="card-body">
							@include('profiles._form')
						</div>
						{{-- ./ .card-body --}}
						<div class="card-footer">
							<div class="form-group row">
								<button type="subbmit" class="btn btn-warning">Update Your Profile</button>

								<button type="reset" class="btn btn-secondary">Cancel</button>
							</div>
						</div>
						{{-- /.card-footer --}}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')
	<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
	<script>
           CKEDITOR.replace( 'bio' );
    </script>
@endpush
