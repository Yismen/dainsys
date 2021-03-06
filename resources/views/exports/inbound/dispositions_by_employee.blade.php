<h4>{{ $dataTitle }}</h4>
<table>
    <tbody>
        <tr>
            <th>Date</th>
            {{-- <th>To Date</th> --}}
            <th>Agent Name</th>
            <th>Agent Disposition</th>
            <th>Average Duration Secs</th>
            <th>Average Handle Secs</th>
            <th>Average Queue Secs</th>
            <th>Average Wrap Secs</th>
            <th>Average Hold Secs</th>
            <th>Average Wait Secs</th>
            <th>Sum Total Calls</th>
            <th>Sum Total Sales</th>
            <th>Conversion Rate</th>
        </tr>

        @foreach ($data as $row)
            <tr>
                <td>{{ $row->call_date }}</td>
                <td>{{ trim("{$row->agent_fname} {$row->agent_lname}") }}</td>
                <td>{{ $row->agent_disposition }}</td>
                <td>{{ $row->total_calls > 0 ? $row->duration_time * 3600 / $row->total_calls : 0 }}</td>
                <td>{{ $row->total_calls > 0 ? $row->agent_duration_time * 3600 / $row->total_calls : 0 }}</td>
                <td>{{ $row->total_calls > 0 ? $row->queue_time * 3600 / $row->total_calls : 0 }}</td>
                <td>{{ $row->total_calls > 0 ? $row->wrap_time * 3600 / $row->total_calls : 0 }}</td>
                <td>{{ $row->total_calls > 0 ? $row->on_hold_time * 3600 / $row->total_calls : 0 }}</td>
                <td>{{ $row->total_calls > 0 ? $row->wait_time * 3600 / $row->total_calls : 0 }}</td>
                <td>{{ $row->total_calls }}</td>
                <td>{{ $row->total_sales }}</td>
                <td>{{ $row->total_calls > 0 ? number_format($row->total_sales / $row->total_calls, 2) : 0 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- $repo->data['mtd']->sum('calls_offered') --}}