@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config('dainsys.app_name'), 'page_description'=>'Crete new client'])

@section('content')	
	<div class="col-sm-8 col-sm-offset-2">
		<div class="card card-primary card-outline">
			<div class="card-header with-border">
				<h4>
					Create Client
					<a href="{{ route('admin.clients.index') }}" class="float-right" title="Return to the List"><i class="fa fa-home"></i></a>
				</h4>
			</div>
			<div class="card-body">
				{!! Form::open(['route'=>['admin.clients.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}	
				
					@include('clients._form')

					<div class="form-group row">
						<div class="col-sm-8 col-sm-offset-2">
							<button class="btn btn-primary"><i class="fa fa-floppy-o"></i> CREATE</button>
						</div>
					</div>
				
				{!! Form::close() !!}
			</div>

			{{-- // errors --}}
		</div>
		
	</div>
@stop

@push('scripts')
	
@endpush