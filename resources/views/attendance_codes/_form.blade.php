<div class="row">
	<div class="col-xs-6">
		<!-- Name -->
			<div class="form-group row {{ $errors->has('name') ? 'has-error' : null }}">
			{!! Form::label('name', ' Name:', ['class'=>'col-sm-12']) !!}
			<div class="col-sm-12">
				{!! Form::input('text', 'name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
				{!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
			</div>
		</div>
		<!-- /. Name -->
	</div>
	
	<div class="col-xs-3">
		<!-- Color -->
		<div class="form-group row {{ $errors->has('color') ? 'has-error' : null }}">
			{!! Form::label('color', ' Color:', ['class'=>'col-sm-12']) !!}
			<div class="col-sm-12">
				{!! Form::input('color', 'color', null, ['class'=>'form-control', 'value' => '#FFFFFF', 'colorpick-eyedropper-active' => "false"]) !!}
				{!! $errors->first('color', '<span class="text-danger">:message</span>') !!}
			</div>
		</div>
		<!-- /. Color -->
	</div>
	
	<div class="col-xs-3">
		<!-- Is Absence -->
			@component('components.fields.checkbox', [
				'field_name' => 'absence',
				'required' => false,
			])
				Is Absence:
			@endcomponent
		<!-- /. Is Absence -->
	</div>
</div>