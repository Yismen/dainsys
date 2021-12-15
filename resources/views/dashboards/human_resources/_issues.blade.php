<div class="card card-danger">
    <div class="card-header with-border"><h4><i class="fa fa-exclamation-triangle"> </i> {{ __('Issue') }}s</h4></div>

    <div class="card-body no-padding">
        <div class="table-responsive">
            <table class="table table-sm table-bordereds">
                <thead>
                    <tr>
                        <th>{{ __('Status') }}</th>
                        <th class="col-xs-2">{{ __('Count') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <th>
                            <a href="/admin/addresses" target="_issues">{{ __('Missing') }} {{ __('Address') }}</a>
                        </th>
                        <td>
                            <span class="badge bg-{{ $issues['missing_address'] > 0 ? 'red' : 'green' }}">{{ $issues['missing_address'] }}</span>
                        </td>
                    </tr>
                    <tr class="">
                        <th>
                            <a href="/admin/punches" target="_issues">{{ __('Missing') }} {{ __('Punch') }} ID</a>
                        </th>
                        <td>
                            <span class="badge bg-{{ $issues['missing_punch'] > 0 ? 'red' : 'green' }}">{{ $issues['missing_punch'] }}</span>
                        </td>
                    </tr>
                    <tr class="">
                        <th>
                            <a href="/admin/arss" target="_issues">{{ __('Missing') }} ARS</a>
                        </th>
                        <td>
                            <span class="badge bg-{{ $issues['missing_ars'] > 0 ? 'red' : 'green' }}">{{ $issues['missing_ars'] }}</span>
                        </td>
                    </tr>
                    <tr class="">
                        <th>
                            <a href="/admin/afps" target="_issues">{{ __('Missing') }} AFP</a>
                        </th>
                        <td>
                            <span class="badge bg-{{ $issues['missing_afp'] > 0 ? 'red' : 'green' }}">{{ $issues['missing_afp'] }}</span>
                        </td>
                    </tr>
                    <tr class="">
                        <th>
                            <a href="/admin/bank_accounts" target="_issues">{{ __('Missing') }} {{ __('Bank Account') }}</a>
                        </th>
                        <td>
                            <span class="badge bg-{{ $issues['missing_bankAccount'] > 0 ? 'red' : 'green' }}">{{ $issues['missing_bankAccount'] }}</span>
                        </td>
                    </tr>
                    <tr class="">
                        <th>
                            <a href="/admin/supervisors" target="_issues">{{ __('Missing') }} Supervisor</a>
                        </th>
                        <td>
                            <span class="badge bg-{{ $issues['missing_supervisor'] > 0 ? 'red' : 'green' }}">{{ $issues['missing_supervisor'] }}</span>
                        </td>
                    </tr>
                    <tr class="">
                        <th>
                            <a href="/admin/nationalities" target="_issues">{{ __('Missing') }} {{ __('Nationality') }}</a>
                        </th>
                        <td>
                            <span class="badge bg-{{ $issues['missing_nationality'] > 0 ? 'red' : 'green' }}">{{ $issues['missing_nationality'] }}</span>
                        </td>
                    </tr>
                    <tr class="">
                        <th>
                            <a href="/admin/schedules" target="_issues">{{ __('Missing') }} {{ __('Schedule') }}</a>
                        </th>
                        <td>
                            <span class="badge bg-{{ $issues['missing_schedules'] > 0 ? 'red' : 'green' }}">{{ $issues['missing_schedules'] }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
