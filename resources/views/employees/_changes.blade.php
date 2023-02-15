@if ($employee->changes->count() > 0)
<h5>{{ __('Changes') }} ({{ __('Latest') }} {{ $employee->changes->count() }})</h5>
<div style="max-height: 300px;
overflow: auto;">
    <div class="table-responsive">
        <table class="table table-condensed table-hover table-bordered">
            <tbody>
                @foreach ($employee->changes as $change)
                <tr>
                    <td>
                        @php
                        $after = json_decode($change->after);
                        @endphp
                        {{ __('On Date') }} {{ $change->updated_at->format('d/M/Y') }}, {{ optional($change->user)->name
                        }}
                        {{ __('Changed') }}:
                        <ul>
                            @foreach (json_decode($change->before) as $key => $value)
                            <li>
                                {{ __('Field') }} {{ $key }},
                                {{ __('From') }} <span class="text-blue">{{ $value }}</span>
                                {{ __('To') }} <span class="text-green">{{ collect($after->$key)->first() }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif