@extends('layouts.app', ['page_header'=>'Contacts', 'page_description'=>'Create a New Contact.'])

@section('content')
<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 ">
	<div class="box box-warning">
		<div class="box-header with-border">
			<h4>
				Edit Contact {{ $contact->name }}
				<a href="{{ route('admin.contacts.index') }}" title="Back to List" class="pull-right"><i
						class="fa fa-home"></i> Back</a>
			</h4>
		</div>
		{!! Form::model($contact, ['route'=>['admin.contacts.update', $contact->id], 'class'=>'', 'role'=>'form',
		'method'=>'PUT']) !!}

		<div class="box-body">
			@include('contacts._form')
		</div>

		<div class="box-footer">
			<div class="form-group">
				<div class="col-sm-8 col-sm-offset-2">
					<button class="btn btn-warning"><i class="fa fa-floppy-o"></i> UPDATE</button>
				</div>
			</div>
		</div>

		{!! Form::close() !!}

		<div class="box-footer">
			<delete-request-button url="{{ route('admin.contacts.destroy', $contact->id) }}"
				redirect-url="{{ route('admin.contacts.index') }}"></delete-request-button>
		</div>


	</div>
</div>
@stop

@push('scripts')

@endpush