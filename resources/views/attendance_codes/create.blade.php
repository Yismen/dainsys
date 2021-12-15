

<div class="card card-primary card-outline">
	<div class="card-header">		
		<h4>
			Create Attendance Codes
		</h4>
	</div>

	{!! Form::open(['route'=>['admin.attendance_codes.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}		
		<div class="card-body">	
			@include('attendance_codes._form')
		</div>
		
		<div class="card-footer">
			<div class="form-group row">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary">Create</button>	
				</div>
			</div>
		</div>
	{!! Form::close() !!}
</div>