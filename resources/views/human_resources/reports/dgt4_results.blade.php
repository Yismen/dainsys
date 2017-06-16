<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="box box-success">
            <div class="box-header with-border">
                <h4>DGT-4 Report for Year {{ 'Year here' }} <span class="badge">{{ $results->count() }} Records</span></h4>
            </div>
    
            <div class="box-body">
                <table class="table table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Hire Date</th>
                            <th>Personal Id</th>
                            <th>Passport</th>
                            <th>Termination Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $employee)
                            <tr>
                                <td>{{ $employee->full_name }}</td>
                                <td>{{ $employee->hire_date->format('d/m/Y') }}</td>
                                <td>{{ $employee->personal_id }}</td>
                                <td>{{ $employee->passport }}</td>
                                <td>{{ $employee->termination ? $employee->termination->termination_date->format('d/m/Y') : '' }}</td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>    
            </div>
    
            {{-- <div class="box-footer"></div> --}}
            
        </div>
    </div>
        
</div>