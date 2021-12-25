
{{-- Internal Info --}}
<table class="table table-sm table-bordered table-hover">
    <tbody>
        <tr>
            <th>{{ __('Hired On') }}: </th>
            <td>
                {{ $employee->hire_date->format('M-d-Y') }},
                {{ $employee->hire_date->diffForHumans() }}
            </td>
        </tr>

        <tr>
            <th>{{ __('Site') }}: </th>
            <td>
                {{ optional($employee->site)->name }}
            </td>
        </tr>

        <tr>
            <th>{{ __('Department') }}: </th>
            <td>
                {{ $employee->position && $employee->position->department ? $employee->position->department->name : '' }}
            </td>
        </tr>

        <tr>
            <th>{{ __('Project') }}: </th>
            <td>
                {{ optional($employee->project)->name }}
            </td>
        </tr>

        <tr>
            <th>{{ __('Position') }}: </th>
            <td>
                {{ optional($employee->position)->name }}
            </td>
        </tr>

        <tr>
            <th>{{ __('Salary') }}: </th>
            <td>
                @if ($employee->position)
                    {{ $employee->position->payment_type ? $employee->position->payment_type->name : ''  }},
                    ${{ $employee->position->salary }}


                @endif
            </td>
        </tr>

        <tr>
            <th>{{ __('Supervisor') }}: </th>
            <td>
                {{ optional($employee->supervisor)->name }}
            </td>
        </tr>

        @if ($employee->is_universal)
            <tr>
                <th colspan="2">
                    <i class="fa fa-globe"></i> 
                    {{ __('This is an Universal Agent') }}
                </th>
            </tr>
        @endif

        @if ($employee->is_vip)
            <tr>
                <th colspan="2">
                    <i class="fa fa-superpowers"></i> 
                    {{ __('This is a VIP Agent') }}
                </th>
            </tr>
        @endif

        <tr>
            <th>{{ __('Sec. Card #') }}: </th>
            <td>
                {{ optional($employee->card)->card }}
            </td>
        </tr>

        <tr>
            <th>{{ __('Punch Id') }}: </th>
            <td>
                {{ optional($employee->punch)->punch }}
            </td>
        </tr>

        <tr>
            <th>{{ __('Login Names') }}: </th>
            <td>
                @if ($employee->loginNames->count() > 0)
                    <ul>
                        @foreach ($employee->loginNames as $login)
                            <li>{{ $login->login }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
    </tbody>
</table>
