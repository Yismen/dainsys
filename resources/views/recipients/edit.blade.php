@extends('layouts.app', ['page_header'=>'Recipients', 'page_description'=>'Edit Recipient ID.'])

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="box box-warning">
				<div class="box-header">
					<h4>Edit Recipient

						[<a href="{{ route('admin.recipients.show', $recipient->id) }}" title="See Details">{{
							$recipient->name
							}}</a>]

						<a href="/admin/recipients" class="pull-right fs-6">
							Back to the list
							<i class="fa fa-list"></i>
						</a>
					</h4>
				</div>


				<div class="box-body">
					{!! Form::model($recipient, ['route'=>['admin.recipients.update', $recipient->id], 'method'=>'PUT',
					'class'=>'form-horizontal', 'role'=>'form']) !!}

					@include('recipients._form')

					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-2">
							<button type="submit" class="btn btn-warning">Update</button>
							<button type="reset" class="btn btn-default">Reset Form</button>
						</div>
					</div>


					{!! Form::close() !!}
				</div>

				<div class="box-footer">
					<delete-request-button url="{{ route('admin.recipients.destroy', $recipient->id) }}"
						redirect-url="{{ route('admin.recipients.index') }}"></delete-request-button>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')

@endpush