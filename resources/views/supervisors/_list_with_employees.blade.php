@if ($supervisor->employees->count() > 0 || $supervisor->active)
    <div class="card card-warning">
        <div class="card-header">
            <h4>
                <a href="{{ route('admin.supervisors.show', $supervisor->id) }}">{{ $supervisor->name }}</a>
                <span class="badge bg-yellow">{{ $supervisor->employees->count() }}</span>
                <a href="{{ route('admin.supervisors.edit', $supervisor->id) }}" class="float-right text-warning">
                    <i class="fa fa-edit"></i>
                </a>
            </h4>
        </div>

        <?php $count = $supervisor->employees->count() == 0 ? 0 : ceil($supervisor->employees->count() / 2) ?>

        <div class="card-body">
            <div class="row">
                @foreach ($supervisor->employees->chunk($count) as $chunk)
                    <div class="col-sm-6">
                        @foreach ($chunk as $employee)
                             <employee-check-card :employee="{{ $employee }}" style="border-top: solid 1px #ccc"
                                >,
                                {{ optional($employee->project)->name }} -
                                {{ optional($employee->position)->name }},
                                {{ optional($employee->site)->name }}
                            </employee-check-card>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

