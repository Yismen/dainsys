<table>
    <tbody>
        <tr>
            <th>Call Date</th>
            <th>Call Time</th>
            <th>Dial Group</th>
            <th>Lead Phone</th>
            <th>Agent Name</th>
            <th>Title</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Suffix</th>
            <th>Address 1</th>
            <th>Address 2</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Disposition</th>
            <th>Notes</th>
            <th>Recording URL</th>
            <th>Aux Data 1</th>
            <th>Aux Data 2</th>
            <th>Aux Data 3</th>
            <th>Aux Data 4</th>
            <th>Aux Data 5</th>
        </tr>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->call_date }}</td>
                <td>{{ now()->parse($row->call_time)->format('H:i:s') }}</td>
                <td>{{ $row->dial_group_name }}</td>
                <td>{{ $row->lead_phone }}</td>
                <td>{{ $row->agent_name }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->first_name }}</td>
                <td>{{ $row->mid_name }}</td>
                <td>{{ $row->last_name }}</td>
                <td>{{ $row->suffix }}</td>
                <td>{{ $row->address1 }}</td>
                <td>{{ $row->address2 }}</td>
                <td>{{ $row->city }}</td>
                <td>{{ $row->state }}</td>
                <td>{{ $row->zip }}</td>
                <td>{{ $row->agent_disposition }}</td>
                <td>{{ $row->notes }}</td>
                <td>{{ $row->recording_url }}</td>
                <td>{{ $row->aux_data1 }}</td>
                <td>{{ $row->aux_data2 }}</td>
                <td>{{ $row->aux_data3 }}</td>
                <td>{{ $row->aux_data4 }}</td>
                <td>{{ $row->aux_data5 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- $repo->data['mtd']->sum('calls_offered') --}}