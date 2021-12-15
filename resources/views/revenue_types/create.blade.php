@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Revenue Types for Logins', 'page_description'=>'Create a new revenue_type.'])

@section('content')
	<div class="container-fluid">
    	<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="card card-primary card-outline">
					<div class="card-header with-border">
						<h4>
							New Revenue Type
							<a href="{{ route('admin.revenue_types.create') }}" class="pull-rght">
								<i class="fa fa-plus"></i> Add
							</a>
						</h4>
					</div>
					{{-- .card-header --}}
					{!! Form::open(['route'=>['admin.revenue_types.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}
						<div class="card-body">
							@include('revenue_types._form')
						</div>
						{{-- .card-body --}}
						<div class="card-footer">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-primary">CREATE</button>
							</div>
						</div>
					{!! Form::close() !!}


				</div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')

@endpush