@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Contacts', 'page_description'=>'Contacts list.'])

@section('content')
	<div class="row">
		<div class="col-sm-12 col-md-10 col-md-offset-1">
			<div class="card-header with-border">
				<h4>
					Your Contacts
					<a href="{{ route('admin.contacts.create') }}" class="float-right small"><i class="fa fa-plus"></i> Add</a>
				</h4>
			</div>

			<div class="card-body">
				@if (count($contacts))
					@foreach ($contacts as $contact)
						<div class="col-sm-6 col-lg-4">
							<div class="card card-widget widget-user-2">
								<div class="widget-user-header bg-yellow">
									<div class="row">
										{{--  <div class="widget-user-image">
											<img class="rounded-circle" src="http://" alt="User Avatar">
										</div>  --}}
											<!-- /.widget-user-image -->
										<h3 class="widget-user-usernamea">
											{{ $contact->name }}
											<a href="{{ route('admin.contacts.edit', $contact->id) }}" title="Edit Contact" class="small"><i class="fa fa-pencil"></i></a>
										</h3>
										<h5 class="widget-user-desc">{{ $contact->main_phone }}</h5>
									</div>
								</div>
								<div class="card-footer">
									<ul class="nav nav-stacked">
										<li><h5>Works At: <span class="float-right">{{ $contact->works_at }}</span></h5></li>
										<li><h5>As: <span class="float-right">{{ $contact->position }}</span></h5></li>
										<li><h5>Other Phone: <span class="float-right">{{ $contact->secondary_phone }}</span></h5></li>
										<li><h5>Email: <span class="float-right">{{ $contact->email }}</span></h5></li>
									</ul>
								</div>
							</div>
						</div>
					@endforeach
				@else
					<div class="callout callout-danger">
						<h4>Looks like you dont have any contact!</h4>
					</div>
				@endif
			</div>

			<div class="row">
				{{ $contacts }}
			</div>
		</div>
	</div>
@stop

