@if ($employee->changes->count() > 0)
    <div class="table-responsive">
        <table class="table table-condensed table-hover table-bordered">
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

@if ($previous_terminations->count() > 0)
    <h5 class="text-danger">{{ __('Previous Terminations') }} - {{ $previous_terminations->count() }}</h5>
    <div class="table-responsive">
        <table class="table table-condensed table-hover table-bordered">
            <thead>                
                <tr>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Type') }}</th>
                    <th>{{ __('Reason') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($previous_terminations as $termination)
                    <tr class="{{ $termination->deleted_at ? 'text-muted' : 'text-danger' }}">
                        <td>
                            {{ __('On Date') }} {{ $termination->termination_date->format('d/M/Y') }}
                        </td>
                        <td>{{ $termination->terminationType->name }}</td>
                        <td>{{ $termination->terminationReason->reason }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
@endif