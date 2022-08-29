<!-- Name -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">
	{!! Form::label('name', ' Name:', ['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-10">
		{!! Form::input('text', 'name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
		{!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
	</div>
</div>
<!-- /. Name -->


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

<h5>Reports:</h5>

<div class="row" style="max-height: 200px;
overflow-y: auto;
margin-bottom: 20px;
background-color: beige;">
	@foreach ($reports->split(2) as $report_split)
	<div class="col-sm-6">
		@foreach ($report_split as $report)

		<div class="checkbox">
			<label>
				{!! Form::checkbox('reports[]', $report->id) !!}
				{{ $report->name }}
			</label>
		</div>

		@endforeach
	</div>
	@endforeach
</div>