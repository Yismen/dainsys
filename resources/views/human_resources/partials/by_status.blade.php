<div class="box box-primary danger-bg">
    <div class="box-header with-border"><h4><i class="fa fa-flag"></i> Total Employees By Status</h4></div>

    <div class="box-body no-padding">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>HC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Actives</th>
                    <td>{{ $by_status['actives'] }}</td>
                </tr>

                <tr>
                    <th>Inactives</th>
                    <td>{{ $by_status['inactives'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="box-footer"></div>
    
</div>