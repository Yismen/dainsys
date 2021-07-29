<h4>{{ $title }}</h4>
<table>
    <tbody>
        <tr>
            <th>Dial Group</th>
            <th>Team</th>
            <th>Agent Name</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Login Time</th>
            <th>Work Time</th>
            <th>Talk Time</th>
            <th>Hours Efficiency</th>
            <th>Talk Time Ratio</th>
            <th>Total Calls</th>
            <th>Proposal Sent / Email Sent</th>
            <th>Email Sent – 3rd Party</th>
        </tr>

        @foreach ($data as $row)
            @php
                $user_dispositions = $dispositions->filter(function($item) use ($row) {
                    return $item->username == $row->username && $item->dial_group_name == $row->dial_group;
                });
            @endphp
            <tr>
                <td>{{ $row->dial_group }}</td>
                <td>{{ $row->team }}</td>
                <td>{{ $row->agent_name }}</td>
                <td>{{ $row->date_from }}</td>
                <td>{{ $row->date_to }}</td>
                <td>{{ $row->login_time }}</td>
                <td>{{ $row->work_time }}</td>
                <td>{{ $row->talk_time + $row->pending_dispo_time }}</td>
                <td>{{ $row->login_time > 0 ? $row->work_time / $row->login_time : 0 }}</td>
                <td>{{ 
                    $row->work_time > 0 ? 
                    ($row->talk_time + $row->pending_dispo_time) / $row->work_time 
                    : 0 
                }}</td>
                <td>{{ $user_dispositions->sum('total_total_calls') }}</td>
                <td>{{ $user_dispositions->sum('total_proposal_sent/email_sent') }}</td>
                <td>{{ $user_dispositions->sum('total_email_sent_third_party') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>