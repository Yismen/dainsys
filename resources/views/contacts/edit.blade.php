@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Contacts', 'page_description'=>'Create a New Contact.'])

@section('content')
	<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 ">
		<div class="card card-warning">
			<div class="card-header with-border">
				<h4>
					Edit Contact {{ $contact->name }}
					<a href="{{ route('admin.contacts.index') }}" title="Back to List"	class="float-right"><i class="fa fa-home"></i> Back</a>
				</h4>
			</div>
			{!! Form::model($contact, ['route'=>['admin.contacts.update', $contact->id], 'class'=>'', 'role'=>'form', 'method'=>'PUT']) !!}

				<div class="card-body">
					@include('contacts._form')
				</div>

				<div class="card-footer">
					<div class="form-group row">
						<div class="col-sm-8 col-sm-offset-2">
							<button class="btn btn-warning"><i class="fa fa-floppy-o"></i> UPDATE</button>
						</div>
					</div>
				</div>

			{!! Form::close() !!}

			<div class="card-footer">
				<delete-request-button
				    url="{{ route('admin.contacts.destroy', $contact->id) }}"
				    redirect-url="{{ route('admin.contacts.index') }}"
				></delete-request-button>
			</div>


		</div>
	</div>
@stop

@push('scripts')

@endpush