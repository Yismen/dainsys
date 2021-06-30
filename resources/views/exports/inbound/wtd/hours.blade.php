<h4>{{ $dataTitle }}</h4>
<table>
    <tbody>
        <tr>
            <th>Name</th>
            @foreach ($dates as $date)
            <th>{{ $date }}</th>                
            @endforeach
            <th>Total</th>
        </tr>

        @foreach ($names as $name)
            <tr>
                <td>{{ $name }}</td>
                @foreach ($dates as $date)
                    @php
                        $name_collection =  $data->filter(function ($item) use ($date, $name) {
                            return $item->agent_name == $name;
                        });

                        $row = $name_collection->first(function ($item) use ($date, $name) {
                            return $item->{'Report Date'} == $date;
                        });
                    @endphp
                    <td>{{ $row->login_time ?? 0  }}</td>
                @endforeach
                <td>{{ $name_collection ? $name_collection->sum('login_time') : 0 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>