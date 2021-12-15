@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config('dainsys.app_name'), 'page_description'=>'No Description'])

@section('content')
	<div class="container-fluid">
		<div class="card card-primary card-outline pad">

			<div class="card card-default">
				<div class="card-header">
					<h3 class="card-title">
						Edit Payment - [{{ $payment_type->name }}]
						<a href="{{ route('admin.payment_types.index') }}" class="float-right">
							<i class="fa fa-arrow-circle-left"></i>
							Back
						</a>
					</h3>
				</div>
				<div class="card-body">
					<div class="col-sm-6 col-sm-offset-3">
						{!! Form::model($payment_type, ['route'=>['admin.payment_types.update', $payment_type->id], 'method'=>'PUT', 'class'=>'form-horizontal', 'role'=>'form']) !!}
							@include('payment_types._form')

							<div class="form-group row">
								<div class="col-sm-10 col-sm-offset-2">
									<button type="submit" class="btn btn-success">UPDATE</button>
									<button type="reset" class="btn btn-secondary">Cancel</button>
								</div>
							</div>

						{!! Form::close() !!}

						<delete-request-button
						    url="{{ route('admin.payment_types.destroy', $payment_type->id) }}"
						    redirect-url="{{ route('admin.payment_types.index') }}"
						></delete-request-button>
					</div>

				</div>
			</div>


			{{-- // errors --}}
		</div>

	</div>

@stop

@push('scripts')

@endpush
