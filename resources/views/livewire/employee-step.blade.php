<div class="container">
    <x-loading></x-loading>
    <div wire:loading.class="hidden">
        <div class="row">
            <div class="col-sm-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4>
                            {{ $employee->full_name }}
                            <div class="progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress }}%;" title="{{ $progress }}% of steps completed">
                                    <span class="sr-only"> {{ $progress }}% Complete</span>
                                </div>
                            </div>
                            
                            
                        </h4>
                    </div>

                    <div class="box-body">
                        <table class="table table-condensed table-hover">
                            <tbody>
                                <tr>
                                    <th>Name:</th>
                                    <td>{{ $employee->full_name }}</td>
                                </tr>
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
            <div class="col-sm-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h4>{{ $process->name }}</h4>
                    </div>

                    <div class="box-body">
                        
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>Step</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($process->steps as $step)
                                    <tr class="{{ in_array($step->id, $employee_steps) ? 'text-success fw-700' : 'text-danger' }}">
                                        <td>{{ $step->name }}</td>
                                        <td>
                                            {{ in_array($step->id, $employee_steps) ? "Completed" : "Pending"}}
                                        </td>
                                        <td>
                                            @if (in_array($step->id, $employee_steps))
                                                <livewire:confirmation
                                                    wire:key="employee-step-{{ $step->id }}"
                                                    name="step"
                                                    model_id="{{ $step->id }}"
                                                    button_text="Mark as pending"
                                                    button_class="btn btn-xs btn-danger"
                                                />
                                            @else
                                                <button class="btn btn-xs btn-success" wire:click="complete({{ $step->id }})">Mark as completed</button>
                                                {{-- <button class="btn btn-xs btn-danger" wire:click="remove({{ $step->id }})">Mark as pending</button> --}}
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