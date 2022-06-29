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
                                <label for="site">
                                    Filter By Site 
                                    @if (count($site_list) > 0)
                                        <button class="btn btn-xs btn-primary" wire:click="$set('site_list', [])">All Sites</button>
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
                                <label for="department">
                                    Filter By Department 
                                    @if (count($department_list) > 0)
                                        <button class="btn btn-xs btn-primary" wire:click="$set('department_list', [])">All Departments</button>
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
                                <label for="project">
                                    Filter By Project 
                                    @if (count($project_list) > 0)
                                        <button class="btn btn-xs btn-primary" wire:click="$set('project_list', [])">All Projects</button>
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
                                <label for="position">
                                    Filter By Position 
                                    @if (count($position_list) > 0)
                                        <button class="btn btn-xs btn-primary" wire:click="$set('position_list', [])">All Positions</button>
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
                                        <span class="input-group-btn">
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
            @include('vips.table', [
                'employees' => $vip_employees,
                'title' => 'VIP Employees',
                'type' => 'vips',
            ])
        </div>
        
        <div class="col-sm-6">
            @include('vips.table', [
                'employees' => $non_vip_employees,
                'title' => 'Non VIP Employees',
                'type' => 'not_vips',
            ])
        </div>
    </div>
</div>
