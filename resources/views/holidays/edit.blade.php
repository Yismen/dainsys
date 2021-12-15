@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Holidays', 'page_description'=>'Edit Holidays ID.'])

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="card card-warning">
				<div class="card-header">
					<h4>
						Edit Holidays {{ $holiday->name }}, Date:
						{{ $holiday->date->format('d-M-Y') }}

						<a href="{{ route('admin.holidays.index') }}" class="float-right" title="Back to List">
							<i class="fa fa-home"></i>
						</a>
					</h4>

				</div>


				<div class="card-body">
					{!! Form::model($holiday, ['route'=>['admin.holidays.update', $holiday->id],
					'method'=>'PUT', 'class'=>'form-horizontal', 'role'=>'form', 'novalidate' => 'novalidate']) !!}

					@include('holidays._form')

					<div class="form-group row">
						<div class="col-sm-6 col-sm-offset-2">
							<button type="submit" class="btn btn-warning">UPDATE</button>
						</div>
					</div>


					{!! Form::close() !!}
				</div>

				<div class="card-footer">
					<delete-request-button url="{{ route('admin.holidays.destroy', $holiday->id) }}"
						redirect-url="{{ route('admin.holidays.index') }}"></delete-request-button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')

@endpush