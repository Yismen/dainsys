<!-- Department Name -->
<div class="col-sm-12">
	<div class="form-group row {{ $errors->has('name') ? 'has-error' : null }}">
		{!! Form::label('name', 'Department Name:', ['class'=>'col-sm-2  col-form-label']) !!}
		<div class="col-sm-10">
			<div class="input-group">
				{!! Form::input('text', 'name', null, ['class'=>'form-control', 'placeholder'=>'Department Name']) !!}     
				<span class="input-group-btn">
					{!! Form::input('submit', 'Save', 'Save!', ['class'=>'btn btn-primary']) !!}
				</span>   
			</div>
	        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
		</div>
	</div>
</div>
<!-- /. Department Name -->