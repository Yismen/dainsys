@if ($previous_terminations)
<h4>
    @lang('Past Terminations')
    <span class="badge bg-red">{{ $previous_terminations->count() }} </span>:
</h4>
<div style="max-height: 300px; overflow: auto;">
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>@lang('Date'):</th>
                <th>@lang('Type'):</th>
                <th>@lang('Reason'):</th>
                <th>@lang('Comments'):</th>
                <th>@lang('Previous Employee Data'):</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($previous_terminations as $termination)
            <tr class=" bg-danger">
                <td>{{ $termination->termination_date->format('d/M/y') }} </td>
                <td>{{ optional($termination->terminationType)->name }} </td>
                <td>{{ optional($termination->terminationReason)->reason }} </td>
                <td>{{ $termination->comments }} </td>
                <td>{{ $termination->employee_data }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif