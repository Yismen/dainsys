@inject('layout', 'App\Models\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Reports', 'page_description'=>'List of reports of production.'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class=" box-header with-border">
                    <h3>
                        Reports List

                        <span class="badge">{{ $reports->total() }}</span>

                        <a href="{{ route('admin.reports.create') }}" class="btn btn-primary btn-sm pull-right">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </h3>
                </div>

                <div class="box-body ">
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Key</th>
                                    <th>Description</th>
                                    <th>Recipients</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                <tr class="{{ $report->active ?  'text-primary fw-600' : 'text-gray' }}">
                                    <td>{{ $report->name }}</td>
                                    <td>{{ $report->key }}</td>
                                    <td>{{ $report->description }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $report->recipients_count > 0 ? 'bg-green' : 'bg-gray' }}">{{
                                            $report->recipients_count }}</span>
                                    </td>
                                    <td>{{
                                        $report->active ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href=" {{ route('admin.reports.show', $report->id) }}"
                                            class="btn btn-default btn-xs">
                                            <i class="fa fa-eye" title="Details"></i>
                                        </a>
                                        <a href="{{ route('admin.reports.edit', $report->id) }}"
                                            class="btn btn-warning btn-xs">
                                            <i class="fa fa-pencil" title="Edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="box-footer">
                    {{ $reports->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush