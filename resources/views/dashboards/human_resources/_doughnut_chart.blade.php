<div class="col-xs-4">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4>{{ $title }}</h4>
        </div>
        <div class="card-body no-padding">
            <doughnut-base-chart
                :labels="{{ $headcounts[$data_key]['labels'] }}"
                :dataset="{{ $headcounts[$data_key]['data'] }}"
            ></doughnut-base-chart>
        </div>

        <div class="card-footer">
            <a href="{{ $link_route }}" title="{{ $title }} Details">
                {{ __('Detail') }}s
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>