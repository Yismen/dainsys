@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Positions', 'page_description'=>'Edit position '.$position->name])

@section('content')
	<div class="container-fluid">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="card card-warning">
				<div class="card-header with-border">
					<h4>
						Edit Position {{ $position->name }}
						<a href="{{ route('admin.positions.index') }}" class="float-right" title="Back to the list"><i class="fa fa-list"></i></a>
					</h4>
				</div>

				<div class="card-body">
					{!! Form::model($position, ['route'=>['admin.positions.update', $position->id], 'method'=>'PUT', 'class'=>'form-horizontal', 'role'=>'form']) !!}

						@include('positions._form')

						<div class="card-footer with-border">
							<div class="form-group row">
								<div class="col-sm-10 col-sm-offset-1">
									<button type="submit" class="btn btn-warning">UPDATE</button>
								</div>
							</div>
						</div>
						{{-- / div.card-body --}}
					{!! Form::close() !!}
				</div>
				{{-- / div.card-body --}}
				<div class="card-footer">

					<delete-request-button
					    url="{{ route('admin.positions.destroy', $position->id) }}"
					    redirect-url="{{ route('admin.positions.index') }}"
					></delete-request-button>

				</div>
			</div>
			{{-- / div."card card-primary card-outline pad" --}}
		</div>
		{{-- / div.col-sm-10 col-sm-offset-1 --}}
	</div>
@stop

@push('scripts')

@endpush
