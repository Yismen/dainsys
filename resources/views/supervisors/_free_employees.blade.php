<div class="col-sm-10 col-sm-offset-1">
    <div class="card card-danger">
        <div class="card-header">
            <h4>
                List of Employees Not Assigned to Any Supervisor
                <span class="badge bg-yellow">{{ $free_employees->count() }}</span>
            </h4>
        </div>
        <div class="card-body">

            <?php $count = $free_employees->count() == 0 ? 0 : ceil($free_employees->count() / 2) ?>

            @foreach ($free_employees->chunk($count) as $chunk)
                <div class="col-sm-6">
                    @foreach ($chunk as $employee)
                         <employee-check-card :employee="{{ $employee }}"
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
