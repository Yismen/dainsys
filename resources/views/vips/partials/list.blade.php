<div class="card card-primary card-outline no-padding">
    <div class="card-header with-border">
        <h3>
            VIP List
        </h3>
    </div>

    <div class="card-body no-padding">
        <table class="table table-sm table-hover table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th class="col-xs-2">Vip Since</th>
                    <th class="col-xs-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vip_list as $employee)
                <tr>
                    <td>
                        <a href="{{ route('admin.employees.show', $employee->id) }}" target="_employee">
                            {{ $employee->id }}
                        </a>
                    </td>
                    <td>{{ $employee->full_name }}</td>
                    <td>{{ $employee->vip->since->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('admin.vips.edit', $employee->vip->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-pencil"></i>
                            Edit
                        </a>
                        <delete-request-button
                            url="{{ route('admin.vips.destroy', $employee->vip->id) }}"
                            btn-class="btn btn-danger btn-sm"
                            btn-text=""
                            redirect-url="{{ route('admin.vips.index') }}"
                        ></delete-request-button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $vip_list->render() }}
    </div>
</div>
