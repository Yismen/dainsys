@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Shifts', 'page_description'=>'Edit shift item'])

@section('content')
	<div class="container-fluid">
    	<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="card card-warning">
					<div class="card-header with-border">
						<h4>Edit Shift {{ $shift->name }}
							<a href="{{ route('admin.shifts.index') }}" class="float-right">
								<i class="fa fa-home"></i>
                            	Return to List
							</a>
						</h4>
					</div>

					{!! Form::model($shift, ['route'=>['admin.shifts.update', $shift->id], 'method'=>'PUT', 'class'=>'', 'role'=>'form', 'novalidate'=>true]) !!}
						<div class="card-body">
							@include('shifts._form')
						</div>

						<div class="card-footer">

							<div class="col-sm-6 col-sm-offset-2">
								<button type="submit" class="btn btn-warning">UPDATE</button>
							</div>
						</div>

					{!! Form::close() !!}

					<div class="card-footer">
						<delete-request-button
						    url="{{ route('admin.shifts.destroy', $shift->id) }}"
						    redirect-url="{{ route('admin.shifts.index') }}"
						></delete-request-button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')

@endpush
