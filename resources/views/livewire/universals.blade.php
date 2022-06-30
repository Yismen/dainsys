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
                                        <button class="btn btn-xs btn-primary" wire:click="$set('site_list', [])" title="All Sites">X</button>
                                    @endif
                                </label>
                                
                                <select class="form-control" multiple wire:model="site_list" id="site">
                                    @foreach ($sites as $site)
                                        <option value="{{ $site->id }}" wire:key="{{ $site->id }}">{{ $site->name }}</option>
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
                                        <button class="btn btn-xs btn-primary" wire:click="$set('department_list', [])" title="All Departments">X</button>
                                    @endif
                                </label>
                                
                                <select class="form-control" multiple wire:model="department_list" id="department">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" wire:key="{{ $department->id }}">{{ $department->name }}</option>
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
                                        <button class="btn btn-xs btn-primary" wire:click="$set('project_list', [])" title="All Projects">X</button>
                                    @endif
                                </label>
                                
                                <select class="form-control" multiple wire:model="project_list" id="project">
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" wire:key="{{ $project->id }}">{{ $project->name }}</option>
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
                                        <button class="btn btn-xs btn-primary" wire:click="$set('position_list', [])" title="All Positions">X</button>
                                    @endif
                                </label>
                                
                                <select class="form-control" multiple wire:model="position_list" id="position">
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}" wire:key="{{ $position->id }}">{{ $position->name }}, ${{ number_format($position->pay_per_hours,0) }}</option>
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
                                    <input type="text" class="form-control" wire:model.lazy="search" wire:ignore id="search">
                            
                                    @if (strlen($search) > 0)
                                        <span class="input-group-btn" title="Clear search">
                                            <button class="btn btn-default" type="button" wire:click="$set('search', '')">X</button>
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
            @include('universals.table', [
                'employees' => $universal_employees,
                'title' => 'Universal Employees',
                'type' => 'universals',
            ])
        </div>
        
        <div class="col-sm-6">
            @include('universals.table', [
                'employees' => $non_universal_employees,
                'title' => 'Non Universal Employees',
                'type' => 'not_universals',
            ])
        </div>
    </div>
</div>
