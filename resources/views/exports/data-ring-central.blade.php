<h4>Ring Central Daily Production Report</h4>
<br>
<table>
    <tbody>
        <tr>
            <th>Team</th>
            <th>Dial Group</th>
            <th>Agent Name</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Login Time</th>
            <th>Work Time</th>
            <th>Talk Time</th>
            <th>Off Hook Time</th>
            <th>Break Time</th>
            <th>Away Time</th>
            <th>Lunch Time</th>
            <th>Training Time</th>
            <th>Pending Disposition Time</th>
            <th>On Hold Time</th>
            <th>Engaged Time</th>
            <th>Available Time</th>
            <th>Total Calls</th>
            <th>Total Sales</th>
            <th>Total Contacts</th>
        </tr>

        @foreach ($data as $row)
            <tr>
                 <td>{{ $row->Team }}</td>
                <td>{{ $row->dial_group }}</td>
                <td>{{ $row->agent_name }}</td>
                <td>{{ $row->date_from }}</td>
                <td>{{ $row->date_to }}</td>
                <td>{{ $row->login_time }}</td>
                <td>{{ $row->work_time }}</td>
                <td>{{ $row->talk_time + $row->pending_dispo_time }}</td> {{-- Talk Time --}}
                <td>{{ $row->off_hook_time }}</td>
                <td>{{ $row->break_time }}</td>
                <td>{{ $row->away_time }}</td>
                <td>{{ $row->lunch_time }}</td>
                <td>{{ $row->training_time }}</td>
                <td>{{ $row->pending_dispo_time }}</td>
                <td>{{ $row->time_on_hold }}</td>
                <td>{{ $row->engaged_time }}</td>
                <td>{{ $row->available_time }}</td>
                <td>{{ $row->total_calls }}</td>
                <td>{{ $row->total_sales }}</td>
                <td>{{ $row->total_contacts }}</td>
            </tr>
        @endforeach
    </tbody>
</table>