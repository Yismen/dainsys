@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config('dainsys.app_name'), 'page_description'=>'Quality Scores'])

@section('content')
	<div class="container-fluid">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="card card-warning">
				<div class="card-header with-border">
					<h4> 
						Edit  
						<a href="{{ route('admin.quality_scores.create') }}" class="float-right"><i class="fa fa-plus"></i> Add Score</a>
					</h4>
				</div>
				<div class="card-body">
					IMport Form
				</div>
            </div>
		</div>
	</div>
@stop

@push('scripts')
@endpush