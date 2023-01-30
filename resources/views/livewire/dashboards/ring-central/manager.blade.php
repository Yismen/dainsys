<div>
    {{-- // Filters --}}
    <div class="box box-primary">
        <div class="box-body flex">
            <div class="col-sm-4 col-md-2">
                <div class="input-group">
                    <label for="team">Team:</label>
                    <select name="team" id="team" class="form-control" required="required" wire:model='team'>
                        <option value="ECC%">All Ecco</option>
                        @foreach ($teams as $team)
                        <option value="{{ $team->team }}">{{ $team->team }}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="col-sm-4 col-md-2">
                <div class="input-group">
                    <label for="date-from">Date From:</label>
                    <input type="date" name="" id="date-from" class="form-control" pattern="" title=""
                        wire:model.defer='date_from'>
                </div>
            </div>

            <div class="col-sm-4 col-md-2">
                <div class="input-group">
                    <label for="date-to">Date To:</label>
                    <input type="date" name="" id="date-to" class="form-control" pattern="" title=""
                        wire:model.defer='date_to'>
                </div>
            </div>

            <div class="col-sm-4 col-md-2">
                <div class="input-group">
                    <label for="client">Client:</label>
                    <select name="client" id="client" class="form-control" required="required" wire:model='client'>
                        <option value="%">All</option>
                        @foreach ($clients as $client )
                        <option value="{{ $client->dial_group_prefix }}">{{ $client->dial_group_prefix }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- <div class="col-sm-4 col-md-2">
                <div class="input-group">
                    <label for="campaign">Campaign: {{ $campaign }}</label>
                    <input type="text" name="" id="campaign" class="form-control" pattern="" title=""
                        wire:model.lazy='campaign'>
                </div>
            </div> --}}

            <div class="col-sm-4 col-md-2 flex align-flex-end">
                <button type="button" class="btn btn-primary" wire:click='$refresh'>
                    <i class="fa fa-refresh"></i>
                    Refresh
                </button>
            </div>

        </div>
    </div>

    {{-- Content --}}
    <div class="box box-primary">
        <div class="box-body">
            <div wire:loading>
                Refreshing Data...
            </div>

            <table class="table table-hover" wire:loading.remove wire:poll.900000ms>
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Login Time</th>
                        <th>Work Time</th>
                        <th>Calls</th>
                        <th>Contacts</th>
                        <th>Sales</th>
                        <th>TT Avg (mins)</th>
                        <th>Dispo Avg (mins)</th>
                        <th>Efficiency %</th>
                        <th>Contact %</th>
                        <th>Conversion %</th>
                        <th>SPH</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($production_data as $item)
                    <tr>
                        <td>{{ $item->client }}</td>
                        <td>
                            {{ $item->total_login_time === 0 ? '-' : number_format($item->total_login_time, 2) }}
                        </td>
                        <td>
                            {{ $item->total_work_time === 0 ? '-' : number_format($item->total_work_time, 2) }}
                        </td>
                        <td>
                            {{ $item->total_calls === 0 ? '-' : number_format($item->total_calls, 0) }}
                        </td>
                        <td>
                            {{ $item->total_contacts === 0 ? '-' : number_format($item->total_contacts, 0) }}
                        </td>
                        <td>
                            {{ $item->total_sales === 0 ? '-' : number_format($item->total_sales, 0) }}
                        </td>
                        <td>
                            {{ $item->talk_time_avg_mins === 0 ? '-' : number_format($item->talk_time_avg_mins, 2) }}
                        </td>
                        <td>
                            {{ $item->dispo_avg_mins === 0 ? '-' : number_format($item->dispo_avg_mins, 2) }}
                        </td>
                        <td>
                            {{ $item->efficiency_rate === 0 ? '-' : number_format($item->efficiency_rate, 2) . '%' }}
                        </td>
                        <td>
                            {{ $item->contact_ratio === 0 ? '-' : number_format($item->contact_ratio) . '%' }}
                        </td>
                        <td>
                            {{ $item->conversion_ratio === 0 ? '-' : number_format($item->conversion_ratio, 2) . '%' }}
                        </td>
                        <td>
                            {{ $item->sph == 0 ? '-' : number_format($item->sph, 2) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    @php
                    $total_login_time = $production_data->sum('total_login_time');
                    $total_work_time = $production_data->sum('total_work_time');
                    $total_calls = $production_data->sum('total_calls');
                    $total_contacts = $production_data->sum('total_contacts');
                    $total_sales = $production_data->sum('total_sales');
                    $total_talk_time = $total_calls * $production_data->sum('total_sales');
                    @endphp
                    <th>Totals:</th>
                    <th>{{ number_format($total_login_time, 2) }}</th>
                    <th>{{ number_format($total_work_time, 2) }}</th>
                    <th>{{ $total_calls }}</th>
                    <th>{{ $total_contacts }}</th>
                    <th>{{ $total_sales }}</th>
                    <td></td>
                    <td></td>
                    <th>{{ $total_login_time > 0 ? number_format($total_work_time / $total_login_time, 2) : 0 }}%</th>
                    <th>{{ $total_calls > 0 ? number_format($total_contacts / $total_calls, 2) : 0 }}%</th>
                    <th>{{ $total_contacts > 0 ? number_format($total_sales / $total_contacts, 2) : 0 }}%</th>
                    <th>{{ $total_work_time > 0 ? number_format($total_sales / $total_work_time, 2) : 0 }}</th>
                </tfoot>
            </table>


        </div>
    </div>
</div>