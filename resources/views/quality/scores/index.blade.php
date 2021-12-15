@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config('dainsys.app_name'), 'page_description'=>'Quality Scores'])

@section('content')
	<div class="container-fluid">
		<div class="cow-sm-12">
			<div class="col-sm-8">
				<div class="card card-primary card-outline">
					<div class="card-body">
						@include('quality.scores.create')
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="card card-primary card-outline">
					<div class="card-body">
						Import from Excel form here
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-12">			
			{{--  /.card-primary card-outline  --}}
			<div class="card card-success">
				<div class="card-body">
					
					<div class="table-responsive">
						<table class="table table-sm table-bordered">
							<thead>
								<tr>
									<th>Unique Id</th>
									<th>Work Date</th>
									<th>Client</th>
									<th>Employee</th>
									<th>Auditor</th>
									<th>Score</th>
									<th>Goal</th>
									<th>Pass</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($scores as $score)
									<tr>
										<td> {{ $score->unique_id }} </td>
										<td> {{ $score->work_date }} </td>
										<td> {{ $score->client->name or '' }}</td>
										<td> {{ $score->employee->full_name or '' }}</td>
										<td> {{ $score->auditor->name or '' }}</td>
										<td> {{ $score->score }}</td>
										<td> {{ "TBD"}}</td>
										<td> {{ "TBD"}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					
				</div>
				<div class="card-footer">{{ $scores->render() }}</div>
			</div>
		</div>
	</div>
@stop

@push('scripts')
    {{--  <script src="{{ asset('js/dainsys/app.js') }}"></script>  --}}
@endpush