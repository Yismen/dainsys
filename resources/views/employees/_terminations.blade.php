@if ($employee->terminations)
    <h4>
         @lang('Past Terminations')
        <span class="badge bg-red">{{ $employee->terminations->count() }} </span>:
    </h4>
    
    <table class="table table-condensed table-hover" >
        <thead>
            <tr>
                <th>@lang('Date'):</th>
                <th>@lang('Type'):</th>
                <th>@lang('Reason'):</th>
                <th>@lang('Comments'):</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee->terminations as $termination)								
                <tr class=" bg-danger">
                    <td>{{ $termination->termination_date->format('d/M/y') }} </td>
                    <td>{{ optional($termination->terminationType)->name }} </td>
                    <td>{{ optional($termination->terminationReason)->reason }} </td>
                    <td>{{ $termination->comments }} </td>
                </tr>	
            @endforeach
        </tbody>
    </table>
@endif