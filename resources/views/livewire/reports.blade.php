<div class="container">
    <x-loading></x-loading>



    <livewire:reports-form />
    <div class="box box-primary">
        <div class="box-header with-border">
            <h5 class="row">
                <div class="col-sm-8">
                    <h4>
                        Reports
                        <span class="badge bg-primary">{{ $reports->total() }}</span>
                    </h4>
                </div>

                {{-- <div class="col-sm-2">
                    <button class="btn btn-primary" title="Create" wire:click="$emit('wantsCreateReport')">
                        <i class="fa fa-plus"></i>
                    </button>
                </div> --}}

                <div class="col-sm-4">
                    <livewire:search debounce='800ms' />
                </div>
            </h5>

        </div>
        <div class="box-body" wire:loading.class="hidden">
            <table class="table table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Key</th>
                        <th>Active</th>
                        <th>Description</th>
                        <th>Reports</th>
                        <th>
                            Action
                            <button class="btn btn-primary pull-right" title="Create"
                                wire:click="$emit('wantsCreateReport')">
                                <i class="fa fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                    <tr @class(['bg-danger' => $report->active === false])>
                        <td scope="row">{{ $report->name }}</td>
                        </td>
                        <td title="{{ $report->key }}">
                            {{ $report->key }}
                        </td>
                        <td title="{{ $report->active }}">
                            {{ $report->active ? 'Yes' : 'No' }}
                        </td>
                        <td title="{{ $report->description }}">
                            {{ str($report->description)->limit(20) }}
                        </td>
                        <td>
                            <span
                                class="badge {{ $report->recipients_count > 0 ? 'bg-green' : 'bg-gray' }}">{{
                                $report->recipients_count }}</span>
                        </td>
                        <td class="col-sm-2">
                            <button class="btn btn-warning btn-block btn-xs"
                                wire:click="$emit('wantsEditReport', {{ $report->id }})">
                                <i class="fa fa-pencil"></i> {{ __('Edit') }}
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="box-footer">
            {{ $reports->links() }}
        </div>
    </div>
</div>
