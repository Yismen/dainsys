<div class="container">
    <x-loading></x-loading>
    <livewire:steps-form />
    <div class="d-flex justify-flex-end mb-2">
        <livewire:submenu :links="[
            ['text' => 'Processes', 'route' => route('admin.processes.index'), 'target' => '_new'],
            ['text' => 'Steps', 'route' => route('admin.steps.index'), 'target' => '_new'],
            ['text' => 'Employee Process Assignation', 'route' => route('admin.employee-process.index'), 'target' => '_new'],
        ]" />
    </div>

    <div wire:loading.class="hidden">
        <div class="box">
            <div class="box-body">

                <h5 class="row">
                    <div class="col-sm-6">
                        <h4>
                            Steps
                            {{-- <span class="badge bg-primary">{{ $steps->total() }}</span> --}}
                        </h4>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            {{-- <label for="process_id" class="control-label col-sm-3">Process</label> --}}
                            <div class="">
                                <div class="{{ $process_id ? 'input-group' : '' }}">
                                    <select class="form-control  {{ $process_id ? 'bg-blue' : '' }}"
                                        wire:model="process_id" id="process_id">
                                        <option value="0">Filter By Process</option>
                                        @foreach ($processes as $process)
                                        <option value="{{ $process->id }}" wire:key="process-{{ $process->id }}">{{
                                            $process->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($process_id)
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" title="Clear"
                                            wire:click="$set('process_id', 0)">X</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div>
                            @if ($steps)
                            <livewire:search />
                            @endif
                        </div>
                    </div>
                </h5>
            </div>
        </div>


        @if ($steps)
        <div class="box box-primary">
            <div class="box-header">
                Steps Associated to Process <strong>{{ $processes->firstWhere('id', $process_id)->name }}</strong>

                <span class="badge bg-blue-active">{{ $steps->total() }}</span>


            </div>
            <div class="box-body">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Order</th>
                            <th>Process</th>
                            <th>Description</th>
                            <th class="col-sm-2">
                                Action
                                <button class="btn btn-primary pull-right" title="Create"
                                    wire:click="$emit('wantsCreateStep')">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($steps as $step)
                        <tr wire:key="step-{{ $step->id }}">
                            <td scope="row">{{ $step->name }}</td>
                            <td scope="row">{{ $step->order }}</td>
                            <td scope="row">{{ $step->process->name }}</td>
                            <td title="{{ $step->description }}">
                                {{ \Illuminate\Support\Str::limit($step->description, 100, '...') }}
                            </td>
                            <td>
                                <button class="btn btn-warning btn-block btn-xs"
                                    wire:click="$emit('wantsEditStep', {{ $step->id }})">
                                    <i class="fa fa-pencil"></i> {{ __('Edit') }}
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="box-footer">
                {{ $steps->links() }}
            </div>
        </div>
        @endif
    </div>
</div>