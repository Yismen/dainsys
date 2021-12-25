@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Sites', 'page_description'=>'Create a new site id.'])

@section('content')
	<div class="container-fluid">
    	<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="card card-primary card-outline pad">
					
					{!! Form::open(['route'=>['admin.sites.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}		
						<legend>New Site</legend>
					
						@include('sites._form')

						<div class="form-group row">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-primary">Create</button>	
							</div>
						</div>
						<div class="form-group row">	
							<div class="col-sm-12">
								<a href="{{ route('admin.sites.index') }}">
									Sites List
									<i class="fa fa-list">	</i>
								</a>
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