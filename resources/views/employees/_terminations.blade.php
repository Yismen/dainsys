@if ($previous_terminations)
<h4>
    @lang('Past Terminations')
    <span class="badge bg-red">{{ $previous_terminations->count() }} </span>:
</h4>

<div style="max-height: 300px; overflow: auto;">
    <table class="table table-condensed table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>@lang('Date'):</th>
                <th>@lang('Type'):</th>
                <th>@lang('Reason'):</th>
                <th>@lang('Previous Employee Data'):</th>
                <th>@lang('Comments'):</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($previous_terminations as $termination)
            <tr class=" bg-danger">
                <td>{{ $termination->termination_date->format('d/M/y') }} </td>
                <td>{{ optional($termination->terminationType)->name }} </td>
                <td>{{ optional($termination->terminationReason)->reason }} </td>
                <td>
                    @if ($termination->employee_data)

                    <span class="badge bg-red">@lang('Site'): {{ $termination->employee_data->site }}</span>
                    <span class="badge bg-red">@lang('Project'): {{ $termination->employee_data->project }}</span>
                    <span class="badge bg-red">@lang('Supervisor'): {{ $termination->employee_data->supervisor }}</span>
                    <span class="badge bg-red">@lang('Hire Date'): {{
                        \Carbon\Carbon::parse($termination->employee_data->hire_date)->format('M-d-Y')
                        }}</span>
                    <span class="badge bg-red">@lang('Department'): {{ $termination->employee_data->department }}</span>
                    <span class="badge bg-red">@lang('Salary'): {{ $termination->employee_data->payment_type }}, ${{
                        $termination->employee_data->salary
                        }}</span>

                    @endif
                </td>
                <td title="{{ $termination->comments }}"> {{ str($termination->comments ?? '')->limit(40) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif