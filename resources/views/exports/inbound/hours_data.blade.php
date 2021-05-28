<h4>{{ $dataTitle }}</h4>
<table>
    <tbody>
        <tr>
            <th>Date</th>
            <th>Team</th>
            <th>Agent Name</th>
            {{-- <th>From Date</th> --}}
            <th>Login Time</th>
        </tr>

        @foreach ($data as $row)
            @php
                $row = collect($row);
            @endphp
            <tr>
                <td>{{ $row->get('Report Date') }}</td>
                <td>{{ $row->get('Team') }}</td>
                <td>{{ trim("{$row->get('First Name')} {$row->get('Last Name')}") }}</td>
                <td>{{ $row->get('login_time') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- $repo->data['mtd']->sum('calls_offered') --}}