@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config('dainsys.app_name'), 'page_description'=>'No Description'])

@section('content')
	<div class="container-fluid">
		<div class="card card-primary card-outline pad">
			
			<div class="card card-default">
				<div class="card-header">
					<h3 class="card-title">
						Adding a New Payment
						<a href="{{ route('admin.payment_types.index') }}" class="float-right">
							<i class="fa fa-arrow-circle-left"></i> 
							Back
						</a>
					</h3>
				</div>
				<div class="card-body">
					<div class="col-sm-6 col-sm-offset-3">
						{!! Form::open(['route'=>['admin.payment_types.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}
							@include('payment_types._form')

							<div class="form-group row">
								<div class="col-sm-10 col-sm-offset-2">
									<button type="submit" class="btn btn-primary">Create</button>
									<button type="reset" class="btn btn-secondary">Reset Form</button>
								</div>
							</div>

							<div class="form-group row">
								<a href="/admin/payment_types">
									Return to list. <i class="fa fa-list"></i>
								</a>
							</div>

						{!! Form::close() !!}
					</div>
					
				</div>
			</div>
			

			{{-- // errors --}}
		</div>

	</div>
	
@stop

@push('scripts')

@endpush
