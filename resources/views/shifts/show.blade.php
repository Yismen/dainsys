@extends('layouts.app', ['page_header'=>config('dainsys.app_name'), 'page_description'=>'Shifts'])

@section('content')
@if ($shift)
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="box box-info">
			<div class="box-header">
				<h4>
					Shift {{ str($shift->name)->headline() }}
					<a href="{{ route('admin.shifts.index') }}" class="pull-right">
						<i class="fa fa-list"></i>
						Shifts List
					</a>
				</h4>
			</div>

			<div class="box-body">
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