
{{-- Display Errors --}}
@if( $errors->any() )
	<div class="col-sm-12">
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
@endif
{{-- /. Errors --}}

<!-- Menu Name -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">
	{!! Form::label('name', 'Menu Name:', ['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-10">
		{!! Form::input('text', 'name', null, ['class'=>'form-control', 'placeholder'=>'Menu Name']) !!}
	</div>
	{{-- {!! $errors->first('name', '<span class="text-danger">:message</span>') !!} --}}
</div>
<!-- /. Menu Name -->

<!-- Display Name -->
<div class="form-group {{ $errors->has('display_name') ? 'has-error' : null }}">
	{!! Form::label('display_name', 'Display Name:', ['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-10">
		{!! Form::input('text', 'display_name', null, ['class'=>'form-control', 'placeholder'=>'Display Name']) !!}
	</div>
	{{-- {!! $errors->first('display_name', '<span class="text-danger">:message</span>') !!} --}}
</div>
<!-- /. Display Name -->

<!-- Description -->
<div class="form-group {{ $errors->has('description') ? 'has-error' : null }}">
	{!! Form::label('description', 'Description:', ['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-10">
		{!! Form::input('text', 'description', null, ['class'=>'form-control', 'placeholder'=>'Description']) !!}
	</div>
	{{-- {!! $errors->first('description', '<span class="text-danger">:message</span>') !!} --}}
</div>
<!-- /. Description -->

<!-- Icon Class -->
<div class="form-group {{ $errors->has('icon') ? 'has-error' : null }}">
	{!! Form::label('icon', 'Icon Class:', ['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-10">
		{!! Form::input('text', 'icon', null, ['class'=>'form-control', 'placeholder'=>'Icon Class']) !!}
	</div>
	{{-- {!! $errors->first('icon', '<span class="text-danger">:message</span>') !!} --}}
</div>
<!-- /. Icon Class -->

<!-- Roles -->
<div class="form-group {{ $errors->has('roles') ? 'has-error' : null }}">
	{!! Form::label('roles', 'Roles:', ['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-10">
		{!! Form::select('roles_lists[]', $rolesList, null, ['class'=>'form-control select-2', 'multiple'=>"multiple", 'id'=>'roles_lists'])!!}
		<span class="help-block">!! Select the roles that will be served with this menu item:</span>
	</div>
	{{-- {!! $errors->first('roles', '<span class="text-danger">:message</span>') !!} --}}
</div>
<!-- /. Roles -->

<link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script>
	jQuery(document).ready(function($) {
		$('#roles_lists').select2();
	});
</script>


