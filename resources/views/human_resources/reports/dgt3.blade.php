@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'DGT-3', 'page_description'=>'Select a year to run the DGT3 report.'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="card card-primary card-outline">

                        <a href="/admin/human_resources" class="float-right"><i class="fa fa-tachometer-alt"></i></a>
                    </h4></div>
                            <!-- Select a Year -->
                            <div class="col-sm-6">
                                <div class="form-group row {{ $errors->has('year') ? 'has-error' : null }}">
                                    {!! Form::label('year', 'Select a Year:', ['class'=>'col-sm-4  col-form-label']) !!}
                                    <div class="col-sm-8">
                                        {!! Form::select('year', $years, null, ['class'=>'form-control form-control-sm']) !!}
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