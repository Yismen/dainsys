<table class="table table-condensed table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Employee</th>
            <th>Login</th>
            <th>System</th>
            <th class="col-xs-3">
                <a href="{{ route('admin.logins.create') }}">
                    <i class="fa fa-plus"></i> Add
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($logins as $login)
        <tr>
            <td>{{ $login->employee->id }}</td>
            <td>
                <a href="{{ route('admin.employees.show', $login->employee->id) }}">
                    {{ $login->employee->full_name }} 
                </a>
            </td>
            <td>
                <a href="{{ route('admin.logins.show', $login->id) }}">{{ $login->login }}</a>
            </td>
            <td>
                <a href="{{ route('admin.systems.show', $login->system->id) }}">{{ ucwords(trim($login->system->name)) }}</a>
            </td>
            <td>
                <a href="{{ route('admin.logins.edit', $login->id) }}" class="btn btn-warning">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>