<h4>{{ $title }}</h4>
<table>
    <tbody>
        <tr>
            <th>Campaign</th>
            <th>Disposition</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Total</th>
            <th>Program TD Total</th>
            <th>Percentage</th>
            <th>Program TD Percentage</th>
        </tr>
        @foreach ($data as $row)
            <tr>
                @php
                    $totalForCampaign = collect($data)->where('dial_group_name', $row->dial_group_name)->sum('dispo_count');
                    $period_td_for_campaign = $period_td->where('dial_group_name', $row->dial_group_name)->sum('dispo_count');
                @endphp
                <td>{{ $row->dial_group_name }}</td>
                <td>{{ $row->agent_disposition }}</td>
                <td>{{ $row->date_from }}</td>
                <td>{{ $row->date_to }}</td>
                <td>{{ $row->dispo_count }}</td>
                <td>
                    {{ $period_td_count = $period_td->where('dial_group_name', $row->dial_group_name)->where('agent_disposition', $row->agent_disposition)->sum('dispo_count') }}
                </td>
                <td>{{ $totalForCampaign > 0 ? $row->dispo_count / $totalForCampaign : 0 }}</td>
                <td>{{ $period_td_for_campaign > 0 ? $period_td_count / $period_td_for_campaign : 0 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- $repo->data['mtd']->sum('calls_offered') --}}