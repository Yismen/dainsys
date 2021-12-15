@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>config('dainsys.app_name'), 'page_description'=>'Downtime Reasons'])

@section('content')
    <div class="container-fluid">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h4>
                        Downtime Reasons
                        <a href="{{ route('admin.downtime_reasons.create') }}" class="float-right">
                            <i class="fa fa-plus"></i>
                            Add
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($downtime_reasons as $reason)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.downtime_reasons.show', $reason->id) }}">{{ $reason->name }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.downtime_reasons.edit', $reason->id) }}" class="text-warning">
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@push('scripts')

@endpush
