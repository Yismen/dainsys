@if (count($birthdays['today']) > 0)
    <p>{{ __('The following employees are on birthday') }}!</p>
    @foreach ($birthdays['today'] as $employee)
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green">
                <a href="{{ route('admin.employees.show', $employee->id) }}" target="_employee" title="Details">
                    <div class="widget-user-image">
                        <img class="img-circle" src="{{ asset($employee->photo) }}" alt="User Avatar">
                    </div>
                </a>
                <!-- /.widget-user-image -->
                <h4 class="widget-user-username">{{ $employee->full_name }}</h4>
                <p class="widget-user-desc">{{ optional($employee->position)->name_and_department }}, {{ optional($employee->site)->name }}</p>
            </div>
        </div>
    @endforeach
@else
    <div class="alert alert-default">
        <strong>{{ __('No Birthdays today') }}!</strong> {{ __('None of your peers have birthdays today') }}...
    </div>
@endif
