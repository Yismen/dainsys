<div class="row">
	<div class="col-sm-12">
		<!-- Name -->
		<div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">
			{!! Form::label('name', ' Name:', ['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
				{!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
			</div>
		</div>
		<!-- /. Name -->
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<!-- Key -->
		<div class="form-group {{ $errors->has('key') ? 'has-error' : null }}">
			{!! Form::label('key', ' Key:', ['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'key', null, ['class'=>'form-control', 'placeholder'=>'Key']) !!}
				{!! $errors->first('key', '<span class="text-danger">:message</span>') !!}
			</div>
		</div>
		<!-- /. Key -->
	</div>
	<div class="col-md-6">
		<!-- Active -->
		<div
			class="form-group {{ $errors->has('active') ? 'has-error' : null }} {{ isset($report) && $report->active ? 'bg-success' : '' }}">
			{!! Form::label('active', ' Active:', ['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::checkbox('active', 1, null, ['class'=>'for-control']) !!}
			</div>
		</div>
		<!-- /. Active -->

	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<!-- Description -->
		<div class="form-group {{ $errors->has('description') ? 'has-error' : null }}">
			{!! Form::label('description', ' Description:', ['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::textArea('description', null, ['class'=>'form-control', 'placeholder'=>'Description', 'rows'
				=> '4']) !!}
				{!! $errors->first('description', '<span class="text-danger">:message</span>') !!}
			</div>
		</div>
		<!-- /. Description -->
	</div>
</div>

<h5>Recipients:</h5>

<div class="row" style="padding: 12px 0;
max-height: 200px;
overflow-y: auto;
margin-bottom: 12px;
border-top: 1px solid #d2d2d2;
border-bottom: 1px solid #d2d2d2;">
	@foreach ($recipients->split(2) as $recipient_split)
	<div class="col-sm-6">
		@foreach ($recipient_split as $recipient)

		<div
			class="checkbox {{ isset($report) && $report->recipients->contains('id', $recipient->id) ? 'bg-success' : ''}}">
			<label>
				{!! Form::checkbox('recipients[]', $recipient->id) !!}
				{{ $recipient->name }}
			</label>
		</div>

		@endforeach
	</div>
	@endforeach
</div>