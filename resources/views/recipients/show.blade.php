@inject('layout', 'App\Models\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Recipients', 'page_description'=>'Details.'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="box box-info">
                <div class="box-header">
                    <h4>
                        {{ $recipient->name }} Details
                        <a href="{{ route('admin.recipients.index') }}" class="pull-right ml-8">
                            <i class="fa fa-home"></i> List
                        </a>
                        <a href="{{ route('admin.recipients.edit', $recipient->id) }}"
                            class="pull-right ml-8 btn btn-sm btn-warning">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                    </h4>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th class="text-right col-sm-2">Email: </th>
                                <td>{{ $recipient->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Title: </th>
                                <td>{{
                                    $recipient->title }}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Reports: </th>
                                <td>
                                    @foreach ($recipient->reports as $report)
                                    <span class="badge bg-gray" title="{{ $report->email }}">
                                        <a href="{{ route('admin.reports.show', $report->id) }}" target="_blank"
                                            rel="noopener noreferrer">
                                            {{ $report->name }}
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