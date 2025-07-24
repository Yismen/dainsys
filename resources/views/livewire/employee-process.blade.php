<div class="container">
    <x-loading></x-loading>
    <div class="d-flex justify-flex-end mb-2">
        <livewire:submenu :links="[
            ['text' => 'Processes', 'route' => route('admin.processes.index')],
            ['text' => 'Steps', 'route' => route('admin.steps.index')],
        ]" />
    </div>

    <div wire:loading.class="hidden">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <h5 class="col-sm-8">
                        Emproyee - Process
                    </h5>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="{{ $process_id ? 'input-group' : '' }}">
                                <select class="form-control {{ $process_id ? 'bg-light-blue' : '' }}"
                                    wire:model="process_id">
                                    <option value="0"></option>
                                    @foreach ($processes as $process)
                                    <option value="{{ $process->id }}">{{ $process->name }}</option>
                                    @endforeach
                                </select>

                                @if ($process_id)
                                <div class="input-group-btn">
                                    <button class="btn btn-default" wire:click="$set('process_id', 0)">X</button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($process_id)
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-2">
                        Site
                        <div class="{{ $site_id ? 'input-group' : '' }}">
                            <select class="form-control {{ $site_id ? 'bg-light-blue' : '' }}" wire:model="site_id">
                                <option value="0"></option>
                                @foreach ($sites as $site)
                                <option value="{{ $site->id }}">{{ $site->name }}</option>
                                @endforeach
                            </select>

                            @if ($site_id)
                            <div class="input-group-btn">
                                <button class="btn btn-default" wire:click="$set('site_id', 0)">X</button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-2">
                        Department
                        <div class="{{ $department_id ? 'input-group' : '' }}">
                            <select class="form-control {{ $department_id ? 'bg-light-blue' : '' }}"
                                wire:model="department_id">
                                <option value="0"></option>
                                @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>

                            @if ($department_id)
                            <div class="input-group-btn">
                                <button class="btn btn-default" wire:click="$set('department_id', 0)">X</button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-2">
                        Project
                        <div class="{{ $project_id ? 'input-group' : '' }}">
                            <select class="form-control {{ $project_id ? 'bg-light-blue' : '' }}"
                                wire:model="project_id">
                                <option value="0"></option>
                                @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>

                            @if ($project_id)
                            <div class="input-group-btn">
                                <button class="btn btn-default" wire:click="$set('project_id', 0)">X</button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-2">
                        Position
                        <div class="{{ $position_id ? 'input-group' : '' }}">
                            <select class="form-control {{ $position_id ? 'bg-light-blue' : '' }}"
                                wire:model="position_id">
                                <option value="0"></option>
                                @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                                @endforeach
                            </select>

                            @if ($position_id)
                            <div class="input-group-btn">
                                <button class="btn btn-default" wire:click="$set('position_id', 0)">X</button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <livewire:search debounce="800ms"/>
                    </div>
                </div>
            </div>
        </div>

        @if ($employees_assigned->total() > 0)
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-success">
                    <div class="box-body">
                        <h4>
                            Employees Assigned to Process [{{ $processes->find($process_id)->name }}]
                            <span class="badge bg-blue-active">{{ $employees_assigned->total() }}</span>

                            <button class="btn btn-primary btn-xs pull-right" title="Refresh" wire:click="$refresh()">
                                <i class="fa fa-refresh"></i> Refresh
                            </button>
                        </h4>

                        <table class="table table-hover table-condensed">
                            <thead>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Project</th>
                                <th>Position</th>
                                <th>Progress</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($employees_assigned as $employee)
                                @php
                                $progress = $employee->processProgress($process_id);
                                @endphp
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.employee-process.show', ['employee_id' => $employee->id, 'process_id' => $process_id]) }}"
                                            target="__new" rel="noopener noreferrer" title="Manage Progress">{{
                                            $employee->full_name }}</a>
                                    </td>
                                    <td>{{ $employee->position->department->name }}</td>
                                    <td>{{ $employee->project->name }}</td>
                                    <td>{{ $employee->position->name }}</td>
                                    <td>
                                        <div class="progress" title="{{ $progress }}">
                                            <div class="progress-bar progress-bar-animated progress-bar-striped progress-bar-{{ $progress == 100 ? 'success' : 'warning' }}"
                                                role="progressbar" style="width: {{ $progress }}%;"
                                                aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                                                Progress</div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-xs btn-danger btn-block"
                                            wire:click="unAssign({{ $employee->id }})">{{ __('Remove') }}</button>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="box-footer">
                        {{ $employees_assigned->links() }}
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if ($employees_not_assigned->total() > 0)
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <h4 class="text-danger">
                            Employees Not Assigned to Process [{{ $processes->find($process_id)->name }}]
                            <span class="badge bg-red-active">{{ $employees_not_assigned->total() }}</span>

                            <button class="btn btn-sm btn-warning pull-right" wire:click="assigAll()">Assign
                                All</button>
                        </h4>

                        <table class="table table-hover table-condensed">
                            <thead>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Project</th>
                                <th>Position</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($employees_not_assigned as $employee)
                                <tr>
                                    <td>{{ $employee->full_name }}</td>
                                    <td>{{ $employee->position->department->name }}</td>
                                    <td>{{ $employee->project->name }}</td>
                                    <td>{{ $employee->position->name }}</td>
                                    <td>
                                        <button class="btn btn-xs btn-success btn-block"
                                            wire:click="assign({{ $employee->id }})">{{ __('Assign') }}</button>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="box-footer">
                        {{ $employees_not_assigned->links() }}
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif
    </div>
</div>
