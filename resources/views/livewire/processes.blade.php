<div class="container">
    <x-loading></x-loading>
    <livewire:processes-form />
    <div class="box box-primary" wire:loading.class="hidden">
        <div class="box-header with-border">
            <h5 class="row">
                <div class="col-sm-8">
                    <h4>
                        Processes
                        <span class="badge bg-primary">{{ $processes->total() }}</span>
                    </h4>
                </div>

                {{-- <div class="col-sm-2">
                    <button class="btn btn-primary" title="Create" wire:click="$emit('wantsCreateProcess')">
                        <i class="fa fa-plus"></i>
                    </button>
                </div> --}}

                <div class="col-sm-4">
                    <livewire:search />
                </div>
            </h5>

        </div>
        <div class="box-body">
            <table class="table table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>
                            Action
                            <button class="btn btn-primary pull-right" title="Create"
                                wire:click="$emit('wantsCreateProcess')">
                                <i class="fa fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($processes as $process)
                    <tr>
                        <td scope="row">{{ $process->name }}</td>
                        <td title="{{ $process->description }}">
                            {{ \Illuminate\Support\Str::limit($process->description, 100, '...') }}
                        </td>
                        <td class="col-sm-2">
                            <button class="btn btn-warning btn-block btn-xs"
                                wire:click="$emit('wantsEditProcess', {{ $process->id }})">
                                <i class="fa fa-pencil"></i> {{ __('Edit') }}
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="box-footer">
            {{ $processes->links() }}
        </div>
    </div>
</div>