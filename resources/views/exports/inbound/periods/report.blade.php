<h4>{{ $title }}</h4>
<table>
    <tbody>
        <tr>
            <th>Name</th>
            @foreach ($dates as $date)
            <th>{{ $date }}</th>
            @endforeach
            <th>PTD Hours</th>
            <th>PTD Calls</th>
            <th>PTD Sales</th>
            <th>PTD Conversion</th>
        </tr>

        @foreach ($names as $name)
            @php
                $agent_calls_data = $calls_data->first(fn ($item) => $item->agent_name == $name);

                $calls = $agent_calls_data->total_calls ?? 0;
                $sales = $agent_calls_data->total_sales ?? 0;
            @endphp
            <tr>
                <td>{{ $name }}</td>
                @foreach ($dates as $date)
                    @php
                        $name_collection =  $hours_data->filter(function ($item) use ( $name) {
                            return $item->agent_name == $name;
                        });

                        $row = $name_collection->first(function ($item) use ($date, $name) {
                            return $item->{'Report Date'} == $date;
                        });
                        $login_time = $name_collection->where('Report Date', $date)->sum('login_time')
                    @endphp
                    <td>{{ $login_time ?? 0  }}</td>
                @endforeach
                <td>{{ $name_collection ? $name_collection->sum('login_time') : 0 }}</td>
                <td>{{ $calls }}</td>
                <td>{{ $sales }}</td>
                <td>{{ $calls > 0 ? number_format($sales / $calls, 2) : 0 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
