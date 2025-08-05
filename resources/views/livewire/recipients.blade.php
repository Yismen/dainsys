<div class="container">

    <livewire:recipients-form />
    <div class="box box-primary">
        <div class="box-header with-border">
            <h5 class="row">
                <div class="col-sm-8">
                    <h4>
                        Recipients
                        <span class="badge bg-primary">{{ $recipients->total() }}</span>
                    </h4>
                </div>

                <div class="col-sm-4">
                    <livewire:search debounce='800ms'/>
                </div>
            </h5>

        </div>
        <div class="box-body">
            <table class="table table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Tile</th>
                        <th>Reports</th>
                        <th>
                            Action
                            <button class="btn btn-primary pull-right" title="Create"
                                wire:click="$emit('wantsCreateRecipient')">
                                <i class="fa fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recipients as $recipient)
                    <tr>
                        <td scope="row">{{ $recipient->name }}</td>
                        </td>
                        <td title="{{ $recipient->email }}">
                            {{ $recipient->email }}
                        </td>
                        <td title="{{ $recipient->title }}">
                            {{ $recipient->title }}
                        </td>
                        <td>
                            @foreach ($recipient->reports as $report)
                                <span class="badge bg-green" title="{{ $report->key }}">{{ $report->name }}</span>
                            @endforeach
                            {{-- <span
                                class="badge {{ $recipient->reports_count > 0 ? 'bg-green' : 'bg-gray' }}">{{
                                $recipient->reports_count }}</span> --}}
                        </td>
                        <td class="col-sm-2 d-block">
                            <button class="btn btn-xs"
                                wire:click="$emit('wantsShowRecipient', {{ $recipient->id }})">
                                <i class="fa fa-pencil"></i> {{ __('Show') }}
                            </button>
                            <button class="btn btn-warning btn-xs"
                                wire:click="$emit('wantsEditRecipient', {{ $recipient->id }})">
                                <i class="fa fa-pencil"></i> {{ __('Edit') }}
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="box-footer">
            {{ $recipients->links() }}
        </div>
    </div>
</div>
