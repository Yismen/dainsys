@extends('layouts.app', ['page_header'=>__('Employees'), 'page_description'=>__('List')])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">

                    <div class="col-sm-6">
                        <h3>@lang('List') @lang('Employees')</h3>
                    </div>

                    <div class="col-sm-6">
                        <!-- Single button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-file-excel-o"></i> Descargar Excel <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('admin.employees.export_to_excel', 'actives') }}" class="">
                                        <i class="fa fa-download"></i> Actives
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.employees.export_to_excel', 'inactives') }}" class="">
                                        <i class="fa fa-download"></i> Inactives
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('admin.employees.export_to_excel', 'all') }}" class="">
                                        <i class="fa fa-download"></i> @lang('All')
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <a href="{{ route('admin.employees.create') }}" class="pull-right">
                            <i class="fa fa-plus"></i> @lang('Create')
                        </a>

                    </div>

                </div>
                {{-- Filters --}}
                <div class="box-body">
                    <div class="form-group col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <label for="inputFiltrarStatus" class="control-label">Filtrar Por Status:</label>
                        <div class="">
                            <select name="FiltrarStatus" id="inputFiltrarStatus" class="form-control" required="required" data-column="6">
                                <option value="all" selected>Todos</option>
                                <option value="actives">Activos</option>
                                <option value="inactives">Inactivos</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <label for="inputFiltrarSite" class="control-label">Filtrar Por Site:</label>
                        <div class="">
                            <select name="FiltrarSite" id="inputFiltrarSite" class="form-control" required="required" data-column="9">
                                <option value="" selected>Todos</option>
                                @foreach ($sites as $site)
                                    <option value="{{ $site->name }}">{{ $site->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <label for="inputFiltrarProject" class="control-label">Filtrar Por Project:</label>
                        <div class="">
                            <select name="FiltrarProject" id="inputFiltrarProject" class="form-control" required="required" data-column="8">
                                <option value="" selected>Todos</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->name }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <label for="inputFiltrarPosition" class="control-label">Filtrar Por Position:</label>
                        <div class="">
                            <select name="FiltrarPosition" id="inputFiltrarPosition" class="form-control" required="required" data-column="7">
                                <option value="" selected>Todos</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->name }}">{{ $position->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <label for="inputFiltrarSupervisor" class="control-label">Filtrar Por Supervisor:</label>
                        <div class="">
                            <select name="FiltrarSupervisor" id="inputFiltrarPosition" class="form-control" required="required" data-column="16">
                                <option value="" selected>Todos</option>
                                @foreach ($supervisors as $supervisor)
                                    <option value="{{ $supervisor->name }}">{{ $supervisor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <label for="inputFiltrarSupervisor" class="control-label"></label>
                        <div class="">
                            <button type="button" class="btn btn-warning" id="removeFilters">Quitar Filtros</button>
                        </div>
                    </div>
                </div>

                {{-- Datatable --}}
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed table-bordered" id="employees-table">
                            <thead>
                                <tr>
                                    <th>Photo:</th>
                                    <th>@lang('First Name'):</th>
                                    <th>@lang('Second') @lang('First name'):</th>
                                    <th>@lang('Last Name'):</th>
                                    <th>@lang('Second') @lang('Last Name'):</th>
                                    <th class="col-xs-1">@lang('Hire Date')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Position'):</th>
                                    <th>@lang('Project'):</th>
                                    <th>@lang('Site'):</th>
                                    <th class="col-xs-1">@lang('Personal Id') / @lang('Passport'):</th>
                                    <th>@lang('Passport'):</th>
                                    <th class="">@lang('Punch Id'):</th>
                                    <th>@lang('Cell Phone'):</th>
                                    <th>Other Phone:</th>
                                    <th>@lang('Edit'):</th>
                                    <th>@lang('Supervisor'):</th>

                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function($){
        $(document).ready(function($) {

            let dTable = $('#employees-table').DataTable({
                "processing": true,
                "serverSide": true,
                searchDelay: 800,
                // "scrollY": "600px",
                // "scrollCollapse": true,
                "pageLength": 10,
                "lengthMenu": [ [10, 25, 100, -1], [10, 25, 100, "All"] ],
                "search": { "regex": true },
                "createdRow": function( row, data, dataIndex){
                    if(! data.active){
                        $(row).addClass('danger');
                    }
                },
                "language": {
                    "processing": "<i class='fa fa-spinner'></i> Loading, Please wait!"
                },
                "ajax": {
                    'type': 'get',
                    "url": "{{ route('admin.employees.index') }}",
                },
                "order": [[ 1, "asc" ], [ 2, "asc" ], [ 3, "asc" ], [ 4, "asc" ]],
                "columns": [
                    {data: 'id', name: 'id', render: function(data, type, full) {
                        return `<a href="/${full.photo}" target="_employee-photo">
                        <div class="widget-user-image">
                            <img src="/${full.photo}"
                                    class="img-circle img-responsive center-block" alt="Image" width="50px">
                        </div>
                    </a> `
                    }},
                    {data: 'first_name', name: 'first_name', render: function(data, type, full) {
                        return `<a href="/admin/employees/${full.id}" title="View employee details">
                            ${full.full_name}
                        </a>`

                    }},
                    {data: 'second_first_name', name: 'second_first_name', 'visible': false},
                    {data: 'last_name', name: 'last_name', 'visible': false},
                    {data: 'second_last_name', name: 'second_last_name', 'visible': false},
                    {data: 'hire_date', name: 'hire_date'},
                    {data: 'status', name: 'status', orderable: false, visible:false},
                    {data: 'position', name: 'position.name', orderable:false, render: function(data, type, full){
                        let position = full.position ? full.position.name : '';
                        let project = full.project ? full.project.name : '';
                        let site = full.site ? full.site.name : '';

                        return `${position}, ${project}, @ ${site}`;
                    }},
                    {data: 'project', name: 'project.name', orderable: false, visible:true, render: function(data, type, full) {
                        return data ? data.name : '';
                    }},
                    {data: 'site', name: 'site.name', orderable: false, visible:false, render: function(data, type, full) {
                        return data ? data.name : '';
                    }},
                    {data: 'personal_id', name: 'personal_id', render: function(data, type, full) {
                        return data ? data : full.passport
                    }},
                    {data: 'passport', name: 'passport', visible: false},
                    {data: 'punch', name: 'punch.punch', orderable: false, render: function(data, type, full) {
                        return data && data.punch ? data.punch : ''
                    }},
                    {data: 'cellphone_number', name: 'cellphone_number'},
                    {data: 'secondary_phone', name: 'secondary_phone', visible: false},
                    {data: 'edit', name: 'edit', searchable: "false", orderable: false, render: function(data, type, full) {
                        return `<a href="${data}" class="text-warning">
                            <i class="fa fa-pencil"></i> Edit
                        </a>`
                    }},
                    {data: 'supervisor', name: 'supervisor.name', orderable: false, visible:false, render: function(data, type, full) {
                        return data ? data.name : '';
                    }},
                ]
            });



            $("#inputFiltrarStatus, #inputFiltrarSite, #inputFiltrarProject, #inputFiltrarPosition, #inputFiltrarSupervisor")
                .change(function(e) {
                    dTable
                        .column( $(this).data('column'))
                        .search($(this).val())
                        .draw();
            });

            $('#removeFilters').click(function() {
                $('#inputFiltrarStatus').val('all');
                $('#inputFiltrarSite, #inputFiltrarProject, #inputFiltrarPosition, #inputFiltrarSupervisor').val('');

                dTable
                    .columns('*')
                    .search('')
                    .draw();
            });
        });

    })(jQuery);

</script>

@endpush
