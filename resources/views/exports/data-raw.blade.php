<h4>Ring Central Daily Raw Report</h4>
<br>
<table>
    <tbody>
        <tr>
            <th>Team</th>
            <th>Agent Name</th>
            <th>Agent User Name</th>
            <th>Login</th>
            <th>Log Out</th>
            <th>Dial Group</th>
            <th>Login Time</th>
            <th>Work Time</th>
            <th>Lunch Time</th>
        </tr>

        @foreach ($data as $row)
            <tr>
                <td>{{ $row->team }}</td>
                <td>{{ $row->agent_name }}</td>
                <td>{{ $row->username }}</td>
                <td>{{ $row->time_in }}</td>
                <td>{{ $row->time_out }}</td>
                <td>{{ $row->dial_group }}</td>
                <td>{{ $row->login_time }}</td>
                <td>{{ $row->work_time }}</td>
                <td>{{ $row->lunch_time }}</td>
            </tr>
        @endforeach
    </tbody>
</table>