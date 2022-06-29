<div class="container">

    <div class="row" wire:loading>
        <div class="col-sm-12">
            ...Loading
        </div>
    </div>

    

    <div class="row" wire:loading.remove>
        <div class="col-sm-12">
            <div class="box" wire:loading.remove>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="" class="col-sm-3 text-right control-label">Filter By Site </label>
                                    @if (count($site_list))                                 
                                        <button class="btn btn-primary btn-xs mb-3" wire:click="$set('site_list', [])">All Sites</button>
                                    @endif
                                    <div class="col-sm-9">
                                        <select class="form-control" multiple wire:model="site_list">
                                            @foreach ($sites as $site)
                                                <option value="{{ $site->id }}" wire:key="{{ $site->id }}">{{ $site->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="" class="col-sm-3">Search</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" wire:model.lazy="search" wire:ignore>
                                
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
