<h4>{{ $title }}</h4>
<table>
    <tbody>
        <tr>
            <th>Dial Group</th>
            <th>Date</th>
            <th>Team</th>
            <th>Agent Name</th>
            <th>Login Time</th>
        </tr>

        @foreach ($data as $row)
            <tr>
                <td>{{ $row->dial_group }}</td>
                <td>{{ $row->production_date }}</td>
                <td>{{ $row->team }}</td>
                <td>{{ $row->agent_name }}</td>
                <td>{{ $row->login_time }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- $repo->data['mtd']->sum('calls_offered') --}}