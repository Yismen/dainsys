@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Contacts', 'page_description'=>'Contacts details.'])

@section('content')
	<div class="col-sm-12 col-md-10 col-md-offset-1">
		<div class="">
			<div class="card-header with-border">
				<h4>
					{{ $contact->name }}
					<a href="{{ route('admin.contacts.create') }}" class="float-right small"><i class="fa fa-home"></i> List</a>
				</h4>
			</div>

			<div class="card-body">
				<ul class="nav nav-stacked">
					<li><h5>Works At: <span class="float-right">{{ $contact->works_at }}</span></h5></li>
					<li><h5>As: <span class="float-right">{{ $contact->position }}</span></h5></li>
					<li><h5>Other Phone: <span class="float-right">{{ $contact->secondary_phone }}</span></h5></li>
					<li><h5>Email: <span class="float-right">{{ $contact->email }}</span></h5></li>
				</ul>
			</div>
		</div>
	</div>
@stop

