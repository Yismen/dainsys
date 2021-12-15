
<div class="card card-warning">
    <div class="card-header">
        <h5>List of Supervisors not assigned to any user </h5>
    </div>

    <div class="card-body">
        <table class="table table-sm table-hover table-bordered">
            <thead>
                <tr>
                    <th>Supervisor Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($free_supervisors as $supervisor)
                    <tr>
                        <td>{{ $supervisor->name }}</td>
                        <td>{{ $supervisor->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    