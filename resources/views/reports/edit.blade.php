@extends('layouts.app', ['page_header'=>'Reports', 'page_description'=>'Edit Report ID.'])

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="box box-warning">
				<div class="box-header">
					<h4>Edit Report

						[<a href="{{ route('admin.reports.show', $report->id) }}" title="See Details">{{ $report->name
							}}</a>]

						<a href="/admin/recipients" class="pull-right fs-6">
							Back to the list
							<i class="fa fa-list"></i>
						</a>
					</h4>
				</div>


				<div class="box-body">
					{!! Form::model($report, ['route'=>['admin.reports.update', $report->id], 'method'=>'PUT',
					'class'=>'form-horizontal', 'role'=>'form']) !!}

					@include('reports._form')

					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-2">
							<button type="submit" class="btn btn-warning">Update</button>
							<button type="reset" class="btn btn-default">Reset Form</button>
						</div>
					</div>


					{!! Form::close() !!}
				</div>

				<div class="box-footer">
					<delete-request-button url="{{ route('admin.reports.destroy', $report->id) }}"
						redirect-url="{{ route('admin.reports.index') }}"></delete-request-button>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')

@endpush