@inject('layout', 'App\Models\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Recipients', 'page_description'=>'List of recipients of
production.'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class=" box-header with-border">
                    <h3>
                        Recipients List

                        <span class="badge">{{ $recipients->total() }}</span>

                        <a href="{{ route('admin.recipients.create') }}" class="btn btn-primary btn-sm pull-right">
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
                                    <th>Email</th>
                                    <th>Title</th>
                                    <th>Reports</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recipients as $recipient)
                                <tr>
                                    <td>{{ $recipient->name }}</td>
                                    <td>{{ $recipient->email }}</td>
                                    <td>{{
                                        $recipient->title }}</td>
                                    <td>

                                        <span
                                            class="badge {{ $recipient->reports_count > 0 ? 'bg-green' : 'bg-gray' }}">{{
                                            $recipient->reports_count }}</span>
                                    </td>
                                    <td>
                                        <a href=" {{ route('admin.recipients.show', $recipient->id) }}"
                                            class="btn btn-default btn-xs">
                                            <i class="fa fa-eye" title="Details"></i>
                                        </a>
                                        <a href="{{ route('admin.recipients.edit', $recipient->id) }}"
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
                    {{ $recipients->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush