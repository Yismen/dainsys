@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config('dainsys.app_name'), 'page_description'=>'Shifts'])

@section('content')
	@if ($shift)
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="card card-info">
					<div class="card-header">
						<h4>
							Shift {{ personName($shift->name) }}
							<a href="{{ route('admin.shifts.index') }}" class="float-right">
								<i class="fa fa-list"></i>
								Shifts List
							</a>
						</h4>
					</div>

					<div class="card-body">
						{{ $shift }}
					</div>
				</div>
			</div>
		</div>
		{{-- /. Row --}}
	@else
		{{-- false expr --}}
	@endif
@stop

@push('scripts')

@endpush