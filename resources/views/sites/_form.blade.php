<!-- Name -->
<div class="form-group row {{ $errors->has('name') ? 'has-error' : null }}">
	{!! Form::label('name', ' Name:', ['class'=>'col-sm-2  col-form-label']) !!}
	<div class="col-sm-10">
		{!! Form::input('text', 'name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
		{!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
	</div>
</div>
<!-- /. Name -->