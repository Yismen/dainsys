<h4>Import Data Form</h4>
{{--  {!! Form::open(['route'=>['admin.performances_import.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>"off",  'files' => true ]) !!}

    <div class="card-header">
        <h4>Import Perforces Data</h4>
    </div>

    <div class="col-sm-12">
        <div class="form-group row {{ $errors->has('excel_file') ? 'has-error' : null }}">
            {!! Form::label('excel_file', 'File Name:', ['class'=>'col-sm-2  col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::file('excel_file[]', null, ['class'=>'form-control', 'placeholder'=>'File Name', 'multiple' => 'multiple']) !!}
                {!! $errors->first('excel_file', '<span class="text-danger">:message</span>') !!}
                {!! $errors->first('excel_file.*', '<span class="text-danger">:message</span>') !!}
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">SUBMIT</button>
        <button type="reset" class="btn btn-secondary">CANCEL</button>
    </div>

{!! Form::close() !!}  --}}

<dropzone-form url="{{ route('admin.performances_import.store') }}"></dropzone-form>
