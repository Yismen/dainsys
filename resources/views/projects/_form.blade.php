<!-- Name -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">
	{!! Form::label('name', ' Name:', ['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-10">
		{!! Form::input('text', 'name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
		{!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
	</div>
</div>
<!-- /. Name -->
<!-- Client -->
<div class="form-group {{ $errors->has('client_id') ? 'has-error' : null }}">
	{!! Form::label('client_id', ' Client:', ['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-10">
		{!! Form::select('client_id', $project->clientsList, null, ['class'=>'form-control select-2', 'placeholder'=>'']) !!}
		{!! $errors->first('client_id', '<span class="text-danger">:message</span>') !!}
	</div>
</div>
<!-- /. Client -->
