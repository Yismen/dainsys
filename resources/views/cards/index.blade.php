@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Cards', 'page_description'=>'Cards list.'])

@section('content')
	<div class="col-sm-8 col-sm-offset-2">
		<div class="card card-primary card-outline">
			<div class="card-header with-border">
				<h3 class="">
					Cards Items List
				 	<a href="{{ route('admin.cards.create') }}" class="float-right">
				 		<i class="fa fa-plus"></i> Add
				 	</a>
				</h3>
			</div>

			<div class="card-body">
				@if ($cards->isEmpty())
					<div class="bs-callout bs-callout-warning">
						<h1>No Cards has been added yet, please add one</h1>
					</div>
				@else
					<table class="table table-sm table-hover">
						<thead>
							<tr>
								<th>Card</th>
								<th>Employee</th>
								<th class="col-xs-3">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($cards as $card)
								<tr>
									<td>
										<a href="{{ route('admin.cards.show', $card->card) }}">{{ $card->card }}</a>
									</td>
									<td>
										<a href="{{ route('admin.employees.show', $card->employee->id) }}">{{ $card->employee->fullName }}</a>
									</td>
									<td>
										<a href="{{ route('admin.cards.edit', $card->card) }}" class="">
											<i class="fa fa-pencil"></i> Edit
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					<div class="text-center">
						{{ $cards }}
					</div>
				@endif
			</div>
		</div>
	</div>
@stop

@push('scripts')

@endpush