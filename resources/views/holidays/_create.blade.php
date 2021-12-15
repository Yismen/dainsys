<div class="card card-primary card-outline">

    <div class="card-header">
        <h4>Create Holidays</h4>
    </div>

    <div class="card-body">
        {!! Form::open(['route'=>['admin.holidays.store'], 'method'=>'POST', 'class'=>'form-horizontal',
        'role'=>'form', 'novalidate'])
        !!}

        @include('holidays._form')

        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">CREATE</button>
            </div>
        </div>

        {!! Form::close() !!}
    </div>



</div>