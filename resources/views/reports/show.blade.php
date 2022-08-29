@inject('layout', 'App\Models\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Reports', 'page_description'=>'Details.'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="box box-info">
                <div class="box-header">
                    <h4>
                        {{ $report->name }} Details
                        <a href="{{ route('admin.reports.index') }}" class="pull-right ml-8">
                            <i class="fa fa-home"></i> List
                        </a>
                        <a href="{{ route('admin.reports.edit', $report->id) }}"
                            class="pull-right ml-8 btn btn-sm btn-warning">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                    </h4>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th class="text-right col-sm-2">Key: </th>
                                <td>{{ $report->key }}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Status: </th>
                                <td class="{{ $report->active ? 'text-primary fw-600' : 'text-gray' }}">{{
                                    $report->active ? 'Active' : 'Inactive' }}</td>
                            </tr>
                            <tr>
                                <th class="text-right col-sm-2">Description: </th>
                                <td>{{ $report->description }}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Recipients: </th>
                                <td>
                                    @foreach ($report->recipients as $recipient)
                                    <span class="badge bg-gray" title="{{ $recipient->email }}">
                                        <a href="{{ route('admin.recipients.show', $recipient->id) }}" target="_blank"
                                            rel="noopener noreferrer">
                                            {{ $recipient->name }}
                                        </a>
                                    </span>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush