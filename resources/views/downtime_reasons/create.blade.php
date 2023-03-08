@extends('layouts.app', ['page_header'=>config('dainsys.app_name'), 'page_description'=>'Crete new downtime reason'])

@section('content')
<div class="col-sm-8 col-sm-offset-2">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h4>
				Create Client
				<a href="{{ route('admin.downtime_reasons.index') }}" class="pull-right" title="Return to the List"><i
						class="fa fa-home"></i></a>
			</h4>
		</div>
		<div class="box-body">
			{!! Form::open(['route'=>['admin.downtime_reasons.store'], 'method'=>'POST', 'class'=>'form-horizontal',
			'role'=>'form']) !!}

			@include('downtime_reasons._form')

			<div class="form-group">
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