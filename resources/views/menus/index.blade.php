@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Menu Items', 'page_description'=>'Control menu items'])

@section('content')
	<div class="container-fluid">
    	<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="card card-primary card-outline">
					<div class="card-header with-border">
						<h4 class="">
							Menu Items
							<a href="{{ route('admin.menus.create') }}" class="float-right">
						 		<i class="fa fa-plus"></i>
						 		 Add Menu Item
						 	</a>
						</h4>
					</div>
					{{-- .card-header --}}
					<div class="card-body">
						<table class="table table-sm table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Route</th>
									<th>Description</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($menus as $menu)
									<tr>
										<td><a href="{{ route('admin.menus.show', $menu->id) }}">{{ $menu->display_name }}</a></td>
										<td>{{ $menu->name }}</td>
										<td>{{ $menu->description }}</td>
										<td>
											<a href="{{ route('admin.menus.edit', $menu->id) }}" class="text-warning">
												<i class="fa fa-pencil"></i> Edit
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					{{-- /.card-body --}}
				</div>
				{{-- .card --}}
			</div>
			{{-- .col --}}
		</div>
	</div>
@endsection
