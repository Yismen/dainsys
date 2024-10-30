<table>
    <tbody>
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>ANI</th>
            <th>CBR</th>
            <th>FName</th>
            <th>LName</th>
            <th>Email</th>
            <th>Street Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Country</th>
            <th>Interested In</th>
            <th>Disposition</th>
            <th>comments</th>
        </tr>

        @foreach ($data as $row)
            @php
                $row = collect($row);
            @endphp
            <tr>
                <td>{{ \Carbon\Carbon::parse($row->get('Date'))->format('Y-m-d') }}</td>
                <td>{{ $row->get('Time') }}</td>
                <td>{{ str($row->get('ANI'))->replace(['-', '(', ')'], '') }}</td>
                <td>{{ str($row->get('CBR'))->replace(['-', '(', ')'], '') }}</td>
                <td>{{ str($row->get('Fname'))->replace(['"'], "") }}</td>
                <td>{{ str($row->get('Lname'))->replace(['"'], "") }}</td>
                <td>{{ str($row->get('Email'))->replace(['"'], "") }}</td>
                <td>{{ str($row->get('StreetAddress'))->replace(['"'], "") }}</td>
                <td>{{ str($row->get('City'))->replace(['"'], "") }}</td>
                <td>{{ str($row->get('State'))->replace(['"'], "") }}</td>
                <td>{{ str($row->get('Zip_Code'))->replace(['"'], "") }}</td>
                <td>{{ str($row->get('Country'))->replace(['"'], "") }}</td>
                <td>{{ str($row->get('Interested In'))->replace(['"'], "") }}</td>
                <td>{{ str($row->get('connected_disposition'))->replace(['"'], "") }}</td>
                <td>{{ str($row->get('Comments'))->replace(['"'], "") }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- $repo->data['mtd']->sum('calls_offered') --}}
