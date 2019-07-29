

@php
    \Carbon\Carbon::setLocale('en');
@endphp
@component('mail::message')
# List of Employees Terminated Since {{ $months }} Months Ago
<table class="dainsys-table">
    <thead>
        <th>Termination Date</th>
        <th>Name</th>
        <th>Personal ID or Passport</th>
        <th>Site</th>
        <th>Tenure</th>
        <th>Termination Type</th>
        <th>Termination Reason</th>
    </thead>

    <tbody>
        @foreach ($terminations as $termination)
            <tr>
                <td>{{ $termination->termination_date->format('M-d-y') }}</td>
                <td>{{ $termination->employee->fullName }}</td>
                <td>{{ filled($termination->employee->personal_id) ? $termination->employee->personal_id : $termination->employee->passport }}</td>
                <td>{{ optional($termination->employee->site)->name }}</td>
                <td>{{ $termination->termination_date->diffForHumans($termination->employee->hire_date) }}</td>
                <td>{{ optional($termination->terminationType)->name }}</td>
                <td>
                    @if (filled($termination->comments))
                        {{ ucfirst(trim($termination->comments)) }}
                    @else
                        {{ optional($termination->terminationReason)->reason }}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endcomponent
<style>


.inner-body {
    width: 95% !important;
    -premailer-width: 95% !important;
}


.footer {
    width: 95% !important;
    -premailer-width: 95% !important;
}

.dainsys-table tbody tr td {
    border-top: solid 1px #ccc !important;
}
</style>
