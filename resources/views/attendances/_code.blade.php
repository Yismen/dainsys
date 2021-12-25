
    <!-- small card -->
    <div class="small-card {{ $color }}">
        <div class="inner">
            <h3>{{ $count }}</h3>

            <p>{{ $title }}</p>
        </div>
        <div class="icon">
            <i class="fa fa-pie-chart"></i>
        </div>
        <a href="{{ route('admin.attendances.code.employees', $code) }}" class="small-card-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>