<!-- File Name -->
<div class="col-sm-12">
    <div class="form-group row {{ $errors->has('excel_file') ? 'has-error' : null }}">
        {!! Form::label('excel_file', 'File Name:', ['class'=>'col-sm-2  col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('excel_file', null, ['class'=>'form-control', 'placeholder'=>'File Name']) !!}        
            {!! $errors->first('excel_file', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>
</div>
<!-- /. File Name -->