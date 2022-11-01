<div class="container">



    <div class="row">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="inputDate" class="control-label">Date:</label>
                            <select name="Date" id="inputDate" class="form-control" wire:model='date'>
                                <option></option>
                                @foreach ($dates as $date)
                                <option value="{{ $date }}">{{ $date }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="inputProject" class="control-label">Project:</label>
                            <select name="Project" id="inputProject" class="form-control" wire:model='project'>
                                <option></option>
                                @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="inputCampaig" class="control-label">Campaig:</label>
                            <select name="Campaig" id="inputCampaig" class="form-control" wire:model='campaign'>
                                <option></option>
                                @foreach ($campaigns as $campaign)
                                <option value="{{ $campaign->id }}">{{ $campaign->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="search">Search:</label>
                            <div class="{{ strlen($search) > 0 ? 'input-group' : '' }}">
                                <input type="text" class="form-control" wire:model="search" wire:ignore id="search">

                                @if (strlen($search) > 0)
                                <span class="input-group-btn" title="Clear search">
                                    <button class="btn btn-default" type="button"
                                        wire:click="$set('search', '')">X</button>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" wire:loading>
            <div class="col-sm-12">
                ...Loading
            </div>
        </div>

        <div class="box box-primary" wire:loading.remove>
            <div class="box-header with-border">
                <h4>Performances <span class="badge bg-primary">{{ $performances->total()
                        }}</span></h4>
            </div>
            <div class="box-body">
                <table class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Employee</th>
                            <th>Supervisor</th>
                            <th>Project</th>
                            <th>Campaign</th>
                            <th>Login Time</th>
                            <th>Prod. Time</th>
                            <th>Sales</th>
                            <th>Revenue</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($performances as $performance)
                        <tr>
                            <td scope="row"> {{ $performance->date }} </td>
                            <td scope="row">
                                <a href="{{ route('admin.performances.show', $performance->id) }}" target="__new">
                                    {{ $performance->employee->full_name }}
                                </a>
                            </td>
                            <td scope="row">
                                {{ $performance->supervisor->name }}
                            </td>
                            <td scope="row">
                                {{ $performance->campaign->project->name }}
                            </td>
                            <td scope="row">
                                {{ $performance->campaign->name }}
                            </td>
                            <td scope="row">
                                {{ $performance->login_time }}
                            </td>
                            <td scope="row">
                                {{ $performance->production_time }}
                            </td>
                            <td scope="row">
                                {{ $performance->transactions }}
                            </td>
                            <td scope="row">
                                {{ $performance->revenue }}
                            </td>
                            <td class="col-sm-1">
                                <a href="{{ route('admin.performances.edit', $performance->id) }}" target="__new"
                                    class="text-warning">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                {{ $performances->links() }}
            </div>
        </div>
    </div>
</div>