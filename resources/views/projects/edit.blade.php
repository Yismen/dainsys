@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Projects', 'page_description'=>'Edit Project ID.'])

@section('content')
	<div class="container-fluid">
    	<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="card card-warning">
					<div class="card-header with-border">
						<h4>
							Edit Project
							[<a href="{{ route('admin.projects.show', $project->id) }}">{{ $project->name }}</a>]
							<a href="/admin/projects" class="float-right">
					    		Back to the list
						    	<i class="fa fa-list"></i>
						    </a>
						</h4>
					</div>


					<div class="card-body">
						{!! Form::model($project, ['route'=>['admin.projects.update', $project->id], 'method'=>'PUT', 'class'=>'form-horizontal', 'role'=>'form']) !!}

							@include('projects._form')

							<div class="form-group row">
								<div class="col-sm-6 col-sm-offset-2">
									<button type="submit" class="btn btn-warning">Update</button>
									<button type="reset" class="btn btn-secondary">Reset Form</button>
								</div>
							</div>


						{!! Form::close() !!}
					</div>

					<div class="card-footer">
						<delete-request-button
							url="{{ route('admin.projects.destroy', $project->id) }}"
							redirect-url="{{ route('admin.projects.index') }}"
						></delete-request-button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')

@endpush
