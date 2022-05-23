@inject('layout', 'App\Models\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Employees', 'page_description'=>"Editar información de empleado $employee->full_name."])

@section('content')
	<div class="container-fluid">
		<div class="col-sm-12">
			<edit-employee :employee="{{ $employee }}"></edit-employee>
		</div><!-- /. Main box -->
	</div>
@endsection

@push('scripts')

@endpush

