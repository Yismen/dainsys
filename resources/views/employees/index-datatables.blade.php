@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Employees', 'page_description'=>'List of active employees.'])

@section('content')
    <div class="col-sm-12">
        <div class="box box-primary">
            
            <div class="box-header with-border">
                Employees List
                <a href="{{ route('admin.employees.create') }}" class="pull-right">
                    <i class="fa fa-plus"></i> Create
                </a>
            </div>

            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover table-condensed" id="employees-table">
                        <thead>
                            <tr>
                                <th>Employee ID:</th>
                                <th>Name:</th>
                                <th>Position:</th>
                                <th>Personal ID:</th>
                                <th>Cell Phone:</th>
                                <th>Edit:</th>
                                
                            </tr>
                        </thead>
                        
                    </table>
                </div>  
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function($){
            $(document).ready(function($) {
                let dTable = $('#employees-table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        'type': 'post',
                        "url": "{{ route('admin.employees.list') }}",
                    },
                    "columns": [
                        {data: 'id', name: 'id'},
                        {data: 'first_name', name: 'first_name', render: function(data, type, full){
                            let first_name = full.first_name || '';
                            let second_first_name = full.second_first_name || '';
                            let last_name = full.last_name || '';
                            let second_last_name = full.second_last_name  || '';
                            return (first_name +' '+second_first_name+' '+last_name+' '+second_last_name).trim();
                        }},
                        {data: 'position_id', name: 'position_id', render: function(data, type, full){
                            return full.position.name;
                        }},
                        {data: 'personal_id', name: 'personal_id'},
                        {data: 'cellphone_number', name: 'cellphone_number'},
                        {data: 'edit', name: 'edit', searchable: "false", orderable: false},
                    ],
                    buttons: ['copy', 'excel', 'pdf']
                });
            });

        })(jQuery);

    </script>
    
@stop