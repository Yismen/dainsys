@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Employees Missing Photo', 'page_description'=>'Show Details'])

@section('content')
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-xs-10 col-xs-offset-1">
			<div class="box box-primary">
				<div class="box-body">
					<div class="col-xs-12 ">
						<a href="{{ route('admin.employees.index') }}" class="pull-right" title="Back to List">
							<i class="fa fa-list"></i>
						</a>
					</div>

                    <table class="table table-striped table-inverse table-hovered table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees_missing_photo as $employee)
                                    <tr>
                                        <td scope="row">{{ $employee->full_name }}</td>
                                        <td>
                                            <img src="{{ $employee->photo }}" alt="Missing Photo" style="max-height: 20px; max-width: 20px;">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.employees.edit', $employee->id) }}" target="__employees" class="text-warning">
                                                <i class="fa fa-pencil"></i> {{ __('Edit') }}
                                            </a> 
                                        </td>
                                    </tr>                                    
                                @endforeach
                            </tbody>
                    </table>
				</div>
				{{-- /. Details --}}
			</div>
		</div>
	</div>
@endsection