{{-- $employees --}}
{{-- $title --}}
{{-- $type --}}
<div class="box box-{{ $type === 'universals' ? 'success' : 'danger' }}">
    <div class="box-header with-border">
        <h4 class="d-flex justifyd-flex justify-space-between align-center">
            <div>
                {{ $title }}
                <span class="badge bg-{{ $type === 'universals' ? 'green' : 'red' }}">{{ $employees->total()
                    }}</span>
            </div>
        </h4>
    </div>
    <div class="box-body">
        <table class="table table-condensed table-hover table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td scope="row">
                        <strong class="text-{{ $type === 'universals' ? 'black' : 'danger' }}">{{ $employee->full_name
                            }}</strong>
                        <br>
                        <span class="text-muted">
                            {{ $employee->position->name }} - ${{ $employee->position->pay_per_hours }} @ {{
                            $employee->project->name }}
                        </span>
                    </td>
                    <td class="col-sm-2">
                        @if ($type === 'universals')
                        <button class="btn btn-danger btn-xs btn-block"
                            wire:click="remove({{ $employee->id }})">Remove</button>
                        @else
                        <button class="btn btn-success btn-xs btn-block"
                            wire:click="create({{ $employee->id }})">Add</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="box-footer">
        {{ $employees->links() }}
    </div>
</div>