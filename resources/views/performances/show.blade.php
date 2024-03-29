@extends('layouts.app', ['page_header'=>'Performances', 'page_description'=>'Details.'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h4>
                        Performance Details {{ $performance->unique_id }}
                        <a href="{{ route('admin.performances.edit', $performance->id) }}" title="Edit This Record"
                            class="text-warning">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <a href="/admin/performances" class="pull-right" title="Back to the list"
                            style="margin-left: 3px;">
                            <i class="fa fa-list"></i> List
                        </a>
                    </h4>
                </div>

                <div class="box-body">
                    <div class="col-sm-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Date: </strong> {{ $performance->date }}
                            </li>

                            <li class="list-group-item">
                                <strong>Employee: </strong> {{ $performance->employee->fullName }}
                            </li>

                            <li class="list-group-item">
                                <strong>Project: </strong> {{ optional(optional($performance->campaign)->project)->name
                                }}
                            </li>

                            <li class="list-group-item">
                                <strong>Campaign: </strong> {{ optional($performance->campaign)->name }}
                            </li>

                            <li class="list-group-item">
                                <strong>SPH Goal: </strong> {{ optional($performance->campaign)->sph_goal }} SPH
                            </li>

                            <li class="list-group-item">
                                <strong>Supervisor: </strong> {{ optional($performance->supervisor)->name }}
                            </li>

                            <li class="list-group-item">
                                <strong>Contacts: </strong> {{ number_format($performance->contacts) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Calls: </strong> {{ number_format($performance->calls) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Sales: </strong> {{ number_format($performance->transactions) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Upsales: </strong> {{ number_format($performance->upsales) }}
                            </li>

                            <li class="list-group-item">
                                <strong>CC Sales: </strong> {{ number_format($performance->cc_sales) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Revenue: </strong> ${{ number_format($performance->revenue, 3) }}
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Login Time: </strong> {{ number_format($performance->login_time, 3) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Production Time: </strong> {{ number_format($performance->production_time, 3) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Talk Time: </strong> {{ number_format($performance->talk_time, 3) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Billable Time: </strong> {{ number_format($performance->billable_hours, 3) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Break Time: </strong> {{ number_format($performance->break_time, 3) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Lunch Time: </strong> {{ number_format($performance->lunch_time, 3) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Training Time: </strong> {{ number_format($performance->training_time, 3) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Away Time: </strong> {{ number_format($performance->away_time, 3) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Off Hook Time: </strong> {{ number_format($performance->off_hook_time, 3) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Pending Disposition Time: </strong> {{
                                number_format($performance->pending_dispo_time, 3) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Downtime Reason: </strong> {{ optional($performance->downtimeReason)->name }}
                            </li>

                            <li class="list-group-item">
                                <strong>Downtime Reported By: </strong> {{ $performance->reported_by }}
                            </li>
                        </ul>
                    </div>
                    {{-- /details --}}
                </div>
                {{-- .box-body --}}
            </div>
        </div>
    </div>
</div>
@endsection