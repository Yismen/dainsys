@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Systems', 'page_description'=>'Show system details'])

@section('content')
	<div class="container-fluid">
    	<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<div class="card card-primary card-outline">
					<div class="card-body">
						{{ $revenue_type }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')

@endpush