@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'DGT-3', 'page_description'=>'Select a year to run the DGT3 report.'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="box box-primary">

                    <div class="box-header with-border"><h4>Run DGT-3 Report
                        <a href="/admin/human_resources" class="pull-right"><i class="fa fa-dashboard"></i></a>
                    </h4></div>
                        
                    <div class="box-body">
                        {!! Form::open(['/admin/human_resources/dgt3', 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>"off",  'enctype'=>"multipart/form-data"]) !!}       
                    
                            <!-- Select a Year -->
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('year') ? 'has-error' : null }}">
                                    {!! Form::label('year', 'Select a Year:', ['class'=>'col-sm-4 control-label']) !!}
                                    <div class="col-sm-8">
                                        {!! Form::select('year', $years, null, ['class'=>'form-control input-sm']) !!}
                                        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <!-- /. Select a Year -->   

                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-warning">RUN DGT-3</button>
                            </div> 
                            
                        {!! Form::close() !!}
                    </div>  
                    
                </div>
            </div>
        </div>

        @isset ($results) 
            @if ($results->count() > 0)
                @include('human_resources.reports.dgt3_results', ['results' => $results])
            @else
                <div class="row">
                    <div class="alert alert-error">
                        <strong>Sorry!</strong> Nothing found
                    </div>
                </div>
            @endif
        @endif

    </div>
@endsection
@push('scripts')

@endpush