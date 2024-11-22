@if ($employee->changes->count() > 0)
<h5>{{ __('Changes') }} ({{ __('Latest') }} {{ $employee->changes->count() }})</h5>
<div style="max-height: 300px;
overflow: auto;">
    <div class="table-responsive">
        @foreach ($employee->changes as $change)
            <h5>{{ __('On Date') }} {{ $change->updated_at->format('d/M/Y') }}, {{ optional($change->user)->name
            }}
            {{ __('Changed') }}:</h5>
            <table class="table table-condensed table-hover table-bordered bg-warning">
                <thead>
                    <tr>
                        <th>{{ __('Field') }}</th>
                        <th>{{ __('Old Value') }}</th>
                        <th>{{ __('New Value') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($change->modifications as $field => $modification)
                        <tr>
                            <td>{{ str($field)->headline() }}</td>
                            <td>{{ $modification['old'] }}</td>
                            <td>{{ $modification['new'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
</div>
@endif
