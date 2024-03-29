@php $title = __('Create New Employee') @endphp
@extends('layouts.app', ['page_header'=>'Employees', 'page_description'=>"{$title}!"])

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="box box-primary">
				<div class="box-header with-border">
					{{ $title }}
					<a href="{{ route('admin.employees.index') }}" class="pull-right"
						title="Return to the employees' list."><i class="fa fa-list"></i></a>
				</div>
				<employee-form :is-updating="false" :employee="{{ $employee }}" next-punch-id="{{ $next_punch_id }}" />
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')

@endpush