@if ($employee->changes->count() > 0)
    <div class="table-responsive">
        <table class="table table-sm table-hover table-bordered">
            <thead>
                <tr>
                    <th>{{ __('Changes') }} ({{ __('Latest') }} {{ $employee->changes->count() }})</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employee->changes as $change)
                    <tr>
                        <td>
                            @php
                                $after = json_decode($change->after);
                            @endphp
                            {{ __('On Date') }} {{ $change->updated_at->format('d/M/Y') }}, {{ optional($change->user)->name }} {{ __('Changed') }}:
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
@endif
