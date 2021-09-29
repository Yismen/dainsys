<!-- Initiate the variable List at 0. This will be auto incremented in the table -->
<?php $list = 0 ?>
<div class="table-responsive">
	<table class="table table-hover table-condensed" id="employees-table">
		<thead>
			<tr>
				<!-- <th>#:</th> -->
				<th>{{ __('Employee') }} ID:</th>
				<th>{{ __('First Name') }}:</th>
				<th>{{ __('Last Name') }}:</th>
				<th>{{ __('Hire Date') }}:</th>
				<th>{{ __('Position') }}:</th>
				<th>{{ __('Personal Id') }}:</th>
				<th>{{ __('Cell Phone') }}:</th>
				<th>
					<a href="{{ route('admin.employees.create') }}" class="">{{ __('Insert') }}
						<i class="fa fa-plus"></i>
					</a>
				</th>
			</tr>
		</thead>
		<tbody>
			@if ($employees)
				@foreach ($employees as $employee)
					<tr class="{{ $employee->status == 'Inactive' ? 'warning' : ''}}">
						{{-- <td>{{  ++$list }}</td> --}}
						<td>{!! link_to_route('admin.employees.show', $employee->id, $employee->id) !!}</td>
						{{-- <td>{!! link_to_route('admin.employees.show', $employee->first_name." ".$employee->last_name, $employee->id ) !!}
							</td> --}}
						<td>{{ $employee->first_name }}</td>
						<td>{{ $employee->last_name }}</td>
						<td>{{ $employee->hire_date }}</td>
						<td>{{ $employee->positions->name }}</td>
						<td>{{ $employee->personal_id }}</td>
						<td>{{ $employee->cellphone_number }}</td>
						<td>																
							<a href="{{ route('admin.employees.edit', $employee->id) }}" class="">
								{{ __('Edit') }} <i class="fa fa-edit"></i>
							</a>
						</td>
					</tr>
				@endforeach
			@else
				<h3>No Employees saved yet...</h3>
			@endif
		</tbody>
		<tfoot>
			<tr>
				<th colspan="50">
					{!! $employees->render() !!}
					<span class="help-block">
						Showing page {!! $employees->count() !!} out of {!! $employees->total() !!} records.
					</span>
				</th>
			</tr>
		</tfoot>
	</table>
</div>	