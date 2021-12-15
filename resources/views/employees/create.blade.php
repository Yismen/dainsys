@inject('layout', 'App\Layout')
@php $title = __('Create New Employee') @endphp
@extends('layouts.'.$layout->app(), ['page_header'=>'Employees', 'page_description'=>"{$title}!"])

@section('content')
	<div class="container-fluid">
    	<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="card card-primary card-outline">
					<div class="card-header with-border">
						{{ $title }} @include('punches._last_punch_id')
						<a href="{{ route('admin.employees.index') }}" class="float-right" title="Return to the employees' list."><i class="fa fa-list"></i></a>
					</div>
					<create-employee :employee="{{ $employee }}"></create-employee>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')

@endpush
