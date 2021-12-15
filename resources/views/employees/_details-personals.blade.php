<div class="card card-widget widget-user-2">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div
        class="widget-user-header {{ $employee->status === 'Active' ? 'bg-green' : 'bg-yellow' }}"
    >
        <a href="{{ file_exists(trim(explode('?', $employee->photo)[0], '/')) ? asset($employee->photo) : 'http://placehold.it/200x200' }}" target="_employee-photo">
            <div class="widget-user-image">
                <img src="{{ file_exists(trim(explode('?', $employee->photo)[0], '/')) ? asset($employee->photo) : 'http://placehold.it/200x200' }}"
                        class="rounded-circle img-fluid mx-auto" alt="Image" width="200px">
            </div>
        </a>
        <!-- /.widget-user-image -->
        <h3 class="widget-user-username">
            {{ $employee->full_name }}
            <a href="{{ route('admin.employees.edit', $employee->id) }}" class="text-gray float-right" title="Edit">
                <i class="fa fa-pencil"></i>
            </a>
        </h3>
        <h5 class="widget-user-desc">
            @if ($employee->position)
                {{ $employee->position->name }}
                @if ($employee->position->department->count)
                    , at {{ $employee->position->department->name }}
                @endif
            @endif
            , {{ $employee->status }}
        </h5>
    </div>

    <div class="footer">
        {{-- Personal Info --}}
        <table class="table table-sm table-bordered table-hover">
            <tbody>
                <tr>
                    <th>{{ __('Personal Id') }} / {{ __('Passport') }}: </th>
                    <td>
                        @if (filled($employee->personal_id))
                            {{ $employee->personal_id }}
                        @else
                            {{ $employee->passport }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>{{ __('Gender') }}: </th>
                    <td>
                        @if ($employee->gender)
                            <i class="fa fa-{{ $employee->gender && $employee->gender->name == 'Male' ? 'male' : 'female' }}"></i>
                            {{ optional($employee->gender)->name }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>{{ __('Phone Number') }}: </th>
                    <td>
                        {{ $employee->cellphone_number }}
                        @if (filled($employee->secondary_number))
                             / {{ $employee->secondary_number }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>{{ __('Address') }}: </th>
                    <td>
                        @if ($employee->address)
                            {{ $employee->address->street_address }},
                            {{ $employee->address->sector }}.
                            {{ $employee->address->city }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>{{ __('Nationality') }}: </th>
                    <td>
                        {{ optional($employee->nationality)->name }}
                    </td>
                </tr>

                <tr>
                    <th>{{ __('Birthday') }} / {{ __('Age') }}: </th>
                    <td>
                        {{ Carbon\Carbon::parse($employee->date_of_birth)->format('M-d-Y') }},
                        {{ Carbon\Carbon::parse($employee->date_of_birth)->age }} {{ __('Years') }}
                    </td>
                </tr>

                <tr>
                    <th>{{ __('Marital Status') }}: </th>
                    <td>
                        {{ optional($employee->marital)->name }}
                    </td>
                </tr>

                <tr>
                    <th>{{ __('Has Kids') }}?: </th>
                    <td>
                        {{ $employee->has_kids ? 'Yes' : 'No' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
