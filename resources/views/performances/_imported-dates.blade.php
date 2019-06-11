<div class="box box-info">
    <div class="box-body">
        <div class="box-header">
            <h4>Imported Dates</h4>
        </div>

        <div class="box-body">
            <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Performance Date</th>
                        <th>Project</th>
                        <th>Campaign</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($performances as $performance)
                        <tr>
                            <td>
                                <a href="/admin/performances/{{ $performance->date }}">{{ $performance->date }}</a>
                            </td>
                            <td>{{ optional($performance->campaign->project)->name }}</td>
                            <td>{{ $performance->campaign->name }}</td>
                            <td>{{ $performance->created_at->diffForHumans() }}</td>
                            <td>
                                <delete-request-button
                                    url="/admin/performances/date/{{ $performance->date }}/campaign/{{ $performance->campaign->id }}"
                                    btn-class="btn btn-link no-padding text-red"
                                    redirect-url="{{ route('admin.performances.index') }}"
                                ></delete-request-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="box-footer">
            {{ $performances }}
        </div>
    </div>
</div>
