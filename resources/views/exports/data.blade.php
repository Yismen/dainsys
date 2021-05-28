<h4>{{ $dataTitle }}</h4>
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
            <th>Total Calls</th>
            <th>Total Sales</th>
            <th>Total Contacts</th>
            <th>SPH</th>
            <th>Conversion Ratio</th>
            <th>Contact Ratio</th>
            <th>Hours Efficiency</th>
            <th>Talk Time Ratio</th>
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
                <td>{{ $row->total_calls }}</td>
                <td>{{ $row->total_sales }}</td>
                <td>{{ $row->total_contacts }}</td>
                <td>{{ $row->work_time > 0 ? $row->total_sales / $row->work_time : 0 }}</td> {{-- SPH --}}
                <td>{{ $row->total_contacts > 0 ? $row->total_sales / $row->total_contacts : 0 }}</td> {{-- Conversion Ratio --}}
                <td>{{ $row->total_calls > 0 ? $row->total_contacts / $row->total_calls : 0 }}</td> {{-- Contacts Ratio --}}
                <td>{{ $row->login_time > 0 ? $row->work_time / $row->login_time : 0 }}</td> {{-- Efficiency --}}
                <td>{{ 
                    $row->work_time > 0 ? 
                    ($row->talk_time + $row->pending_dispo_time) / $row->work_time 
                    : 0 
                }}</td> {{-- Talk Time Ratio --}}
            </tr>
        @endforeach
    </tbody>
</table>

{{-- $repo->data['mtd']->sum('calls_offered') --}}