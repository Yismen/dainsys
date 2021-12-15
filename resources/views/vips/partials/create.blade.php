<div class="card card-primary card-outline">

    <div class="card-header">
        <h4>Add to VIP List</h4>
    </div>

    <div class="card-body">
        {!! Form::open(['route'=>['admin.vips.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form'])
        !!}

        @include('vips._form')

        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>

        {!! Form::close() !!}
    </div>



</div>