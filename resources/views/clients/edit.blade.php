@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config('dainsys.app_name'), 'page_description'=>'Edit Client '.$client->name])

@section('content')
	<div class="col-sm-8 col-sm-offset-2">
		<div class="card card-primary card-outline">
			<div class="card-body">
				{!! Form::model($client, ['route'=>['admin.clients.update', $client->id], 'method'=>'PUT', 'class'=>'form-horizontal', 'role'=>'form']) !!}	
			
					@include('clients._form')

					<div class="col-sm-6 col-sm-offset-2">
						<button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> UPDATE</button>				
					</div>
				
				{!! Form::close() !!}
			</div>
				
		</div>
	</div>

@stop

@push('scripts')
	
@endpush