<div class="container">
    <x-loading></x-loading>
    <div class="d-flex justify-flex-end mb-2">
        <livewire:submenu :links="[
            ['text' => 'Processes', 'route' => route('admin.processes.index')],
            ['text' => 'Steps', 'route' => route('admin.steps.index')],
            ['text' => 'Employee Process Assignation', 'route' => route('admin.employee-process.index')],
        ]" />
    </div>

    <div wire:loading.class="hidden">
        <div class="row">
            <div class="col-sm-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4>
                            <a href="{{ route('admin.employees.show', $employee->id) }}" title="View Profile">
                                {{ $employee->full_name }}</a>
                            <div class="progress">
                                <div class="progress-bar progress-bar-{{ $progress == 100 ? 'success' : 'warning' }} progress-bar-striped"
                                    role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ $progress }}%;"
                                    title="{{ $progress }}% of steps completed">
                                    <span class="sr-only"> {{ $progress }}% Complete</span>
                                </div>
                            </div>


                        </h4>
                    </div>

                    <div class="box-body">
                        <table class="table table-condensed table-hover">
                            <tbody>
                                <tr>
                                    <th>Site</th>
                                    <td>{{ $employee->site->name }}</td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td>{{ $employee->position->department->name }}</td>
                                </tr>
                                <tr>
                                    <th>Project</th>
                                    <td>{{ $employee->project->name }}</td>
                                </tr>
                                <tr>
                                    <th>Position</th>
                                    <td>{{ $employee->position->name }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h4>{{ $process->name }}</h4>
                    </div>

                    <div class="box-body">

                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('Step') }}</th>
                                    <th class="col-sm-2">{{ __('Status') }}</th>
                                    <th class="col-sm-2">{{ __('Completed') }} {{ __('At') }}</th>
                                    <th class="col-sm-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($process->steps as $step)
                                @php
                                $employee_step = $employee->steps->firstWhere('id', $step->id);
                                $step_assigned = $employee_step ? true : false;

                                @endphp
                                <tr class="{{ $step_assigned ? 'text-success fw-700' : 'text-danger' }}">
                                    <td>{{ $step->name }}</td>
                                    <td>
                                        @if ($step_assigned)
                                        {{ __('Done') }}
                                        <i class="fa fa-check"></i>
                                        @else
                                        {{ __('Pending') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($step_assigned)

                                        <span class="text-muted"
                                            title="{{ $employee_step->pivot->updated_at->format('d-M-y H:i') }}">
                                            {{ $employee_step->pivot->updated_at->diffForHumans() }}
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($step_assigned)
                                        <livewire:confirmation wire:key="employee-step-{{ $step->id }}" name="step"
                                            model_id="{{ $step->id }}" button_text="Mark as pending"
                                            button_class="btn btn-xs btn-danger" />
                                        @else
                                        <button class="btn btn-xs btn-success"
                                            wire:click="complete({{ $step->id }})">Mark as completed</button>
                                        {{-- <button class="btn btn-xs btn-danger"
                                            wire:click="remove({{ $step->id }})">Mark as pending</button> --}}
                                        @endif
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
</div>