<div class="card card-danger">

    <div class="card-header with-border">
        <h4> List of Employees Missing Schedule ID </h4>
    </div>

    <div class="card-body">
        <table class="table table-sm table-hover">
            <thead>
                <tr>
                    <th>Employee</th>
                    <th class="col-xs-3">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($employees_missing_schedule as $employee)
                    <tr>
                        <td>
                            <a href="{{ route('admin.employees.show', $employee->id) }}" target="_employee">{{ $employee->full_name }}</a>
                        </td>
                        <td>
                            <a href="/admin/schedules/create?employee={{ $employee->id }}">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $employees_missing_schedule->render() }}
    </div>
</div>
