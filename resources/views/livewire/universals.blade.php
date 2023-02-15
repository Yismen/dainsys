<div class="container">

    <div class="row" wire:loading>
        <div class="col-sm-12">
            ...Loading
        </div>
    </div>

    <div class="row" wire:loading.remove>
        <div class="col-sm-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        {{-- Site Filter --}}
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="site" class="d-flex justify-space-between">
                                    Filter By Site
                                    @if (count($site_list) > 0)
                                    <button class="btn btn-xs btn-primary" wire:click="$set('site_list', [])"
                                        title="All Sites">X</button>
                                    @endif
                                </label>

                                <select class="form-control" multiple wire:model="site_list" id="site">
                                    @foreach ($sites as $site)
                                    <option value="{{ $site->id }}" wire:key="{{ $site->id }}">{{ $site->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- Department Filter --}}
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="department" class="d-flex justify-space-between">
                                    Filter By Department
                                    @if (count($department_list) > 0)
                                    <button class="btn btn-xs btn-primary" wire:click="$set('department_list', [])"
                                        title="All Departments">X</button>
                                    @endif
                                </label>

                                <select class="form-control" multiple wire:model="department_list" id="department">
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" wire:key="{{ $department->id }}">{{
                                        $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- Project Filter --}}
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="project" class="d-flex justify-space-between">
                                    Filter By Project
                                    @if (count($project_list) > 0)
                                    <button class="btn btn-xs btn-primary" wire:click="$set('project_list', [])"
                                        title="All Projects">X</button>
                                    @endif
                                </label>

                                <select class="form-control" multiple wire:model="project_list" id="project">
                                    @foreach ($projects as $project)
                                    <option value="{{ $project->id }}" wire:key="{{ $project->id }}">{{ $project->name
                                        }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- Position Filter --}}
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="position" class="d-flex justify-space-between">
                                    Filter By Position
                                    @if (count($position_list) > 0)
                                    <button class="btn btn-xs btn-primary" wire:click="$set('position_list', [])"
                                        title="All Positions">X</button>
                                    @endif
                                </label>

                                <select class="form-control" multiple wire:model="position_list" id="position">
                                    @foreach ($positions as $position)
                                    <option value="{{ $position->id }}" wire:key="{{ $position->id }}">{{
                                        $position->name }}, ${{ number_format($position->pay_per_hours,0) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="search">Search</label>
                                <div class="{{ strlen($search) > 0 ? 'input-group' : '' }}">
                                    <input type="text" class="form-control" wire:model.debounce.750ms="search"
                                        wire:ignore id="search">

                                    @if (strlen($search) > 0)
                                    <span class="input-group-btn" title="Clear search">
                                        <button class="btn btn-default" type="button"
                                            wire:click="$set('search', '')">X</button>
                                    </span>
                                    @endif
                                </div>
                                <small class="form-text text-muted">Press enter ot tab away!</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            @if ($universals->count() > 0)
            <div class="d-flex align-flex-end justify-flex-end mb-3">
                <livewire:confirmation name="confirmation_remove_all_universals" model_id="0" button_text="Remove All"
                    icon="fa fa-plus" button_class="btn btn-danger btn-xs" />
            </div>

            @include('universals.table', [
            'employees' => $universals,
            'title' => 'Universal Employees',
            'type' => 'universals',
            ])
            @endif
        </div>

        <div class="col-sm-6">
            @if ($noUniversals->count() > 0)
            <div class="d-flex align-flex-end justify-flex-end mb-3">
                <livewire:confirmation name="confirmation_assign_all_universals" model_id="0" button_text="Assign All"
                    icon="fa fa-plus" button_class="btn btn-warning btn-xs" />
            </div>

            @include('universals.table', [
            'employees' => $noUniversals,
            'title' => 'Non Universal Employees',
            'type' => 'not_universals',
            ])
            @endif
        </div>
    </div>
</div>