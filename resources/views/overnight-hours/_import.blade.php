<div class="card card-primary card-outline">

    <div class="card-header">
        <h4>Import Overnight Hours From Excel</h4>
    </div>

    <div class="card-body">
        {!! Form::open(['route'=>['admin.import_overnight_hours.store'], 'method'=>'POST', 'class'=>'form-horizontal',
        'role'=>'form', 'files' => true])
        !!}

        {{-- <form action="" enctype="multipart/form-data"></form> --}}
        <!-- Selet Excel File -->
        <div class="col-sm-12">
            <div class="form-group row {{ $errors->has('_file_') ? 'has-error' : null }}">
                {!! Form::label('_file_', 'Selet Excel File:', ['class'=>'col-xs-4 col-md-12']) !!}
                <div class="col-xs-8 col-md-12">
                    {!! Form::file('_file_', ['class'=>'form-control', 'placeholder'=>'Selet Excel
                    File']) !!}
                    {!! $errors->first('_file_', '<span class="text-danger">:message</span>') !!}
                </div>
                <span class="col-xs-offset-4 col-md-offset-0 form-text">Excel files only!</span>
            </div>
        </div>
        <!-- /. Selet Excel File -->

        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">Import File</button>
            </div>
        </div>

        {!! Form::close() !!}
    </div>

    <div class="card-footer">
        <x-errors-div></x-errors-div>
    </div>



</div>