<div class="col-sm-8 col-sm-offset-2">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4>
                Search by Date:
                <a href="{{ route('admin.attendances.index') }}" class="float-right">
                    <i class="fa fa-home"></i> List
                </a>
            </h4>
        </div>

        <div class="card-body" style="max-height: 200px; overflow-y: auto;">
            @foreach ($dates as $item)
                <a href="{{ route('admin.attendances.date', $item->date) }}" 
                    class="btn btn-sm {{ $item->date == request()->route()->parameters('date')['date'] ? 'btn-primary' : 'btn-secondary' }}">
                    {{ $item->date }}
                </a>
            @endforeach
        </div>
    </div>
</div>