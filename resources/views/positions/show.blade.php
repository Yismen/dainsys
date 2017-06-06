@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Positions', 'page_description'=>$position->name.'\'s details'])

@section('content')
	@if ($position)
		<div class="container-fluid">
			<div class="box box-primary pad">
				<ul class="list-group">
					<li class="list-group-item">
						<strong>Name: </strong>{{ $position->name }}
					</li>
					<li class="list-group-item">
						<strong>Department: </strong>{{ $position->department->department }}
					</li>
					<li class="list-group-item">
						<strong>Paid as: </strong>{{ $position->payment->payment_type }}
					</li>
					<li class="list-group-item">
						<strong>Saraly: </strong>RD$ {{ $position->salary }}
					</li>
				</ul>
				<a href="{{ route('admin.positions.edit', $position->id) }}" class="btn btn-warning"> Edit </a>
				{{-- {!! delete_button('positions.destroy', $position->name, ['class'=>"btn btn-danger", 'label' => 'Delete']) !!} --}}
				<hr>
				<a href="{{ route('admin.positions.index') }}" class=""> << Return to Positions List </a>
			</div>
		</div>
		{{-- /. Row --}}
	@else
		{{-- false expr --}}
	@endif
@stop

@section('scripts')
	
@stop