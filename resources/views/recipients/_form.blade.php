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
		<!-- Email -->
		<div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
			{!! Form::label('email', ' Email:', ['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('email', 'email', null, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
				{!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
			</div>
		</div>
		<!-- /. Email -->
	</div>


	<div class="col-md-6">
		<!-- Title -->
		<div class="form-group {{ $errors->has('title') ? 'has-error' : null }}">
			{!! Form::label('title', ' Title:', ['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'title', null, ['class'=>'form-control', 'placeholder'=>'Title']) !!}
				{!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
			</div>
		</div>
		<!-- /. Title -->

	</div>
</div>

<h5>Reports:</h5>

<div class="row" style="padding: 12px 0;
max-height: 200px;
overflow-y: auto;
margin-bottom: 12px;
border-top: 1px solid #d2d2d2;
border-bottom: 1px solid #d2d2d2;">
	@foreach ($reports->split(2) as $report_split)
	<div class="col-sm-6">
		@foreach ($report_split as $report)
		<div
			class="checkbox {{ isset($recipient) && $recipient->reports->contains('id', $report->id) ? 'bg-success' : ''}}">
			<label>
				{!! Form::checkbox('reports[]', $report->id) !!}
				{{ $report->name }}
			</label>
		</div>

		@endforeach
	</div>
	@endforeach
</div>