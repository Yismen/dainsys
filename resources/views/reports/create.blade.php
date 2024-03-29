@extends('layouts.app', ['page_header'=>'Reports', 'page_description'=>'Create a new report id.'])

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="box box-primary pad">

				{!! Form::open(['route'=>['admin.reports.store'], 'method'=>'POST', 'class'=>'form-horizontal',
				'role'=>'form']) !!}
				<legend>
					New Report

					<a href="/admin/reports" class="pull-right fs-6">
						Back to the list
						<i class="fa fa-list"></i>
					</a>
				</legend>

				@include('reports._form')

				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<button type="submit" class="btn btn-primary">Create</button>
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