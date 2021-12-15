<div class="card card-success">
        <div class="card-body">
        {!! Form::open(['route'=>['admin.banks.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>"off",  'enctype'=>"multipart/form-data"]) !!} 
            
            <div class="card-header with-border"><h4>Create Bank</h4></div>
                
                <div class="col-sm-8">
                    @include('banks._form')
                </div>
                <div class="col-sm-4">
                    <div class="card-footer with-border">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                        <button type="submit" class="btn btn-secondary">CANCEL</button>
                    </div>
                </div>
                


        {!! Form::close() !!}
            
    </div>
</div>