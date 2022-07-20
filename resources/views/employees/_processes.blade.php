@if ($employee->processes)
<div class="row">
    <div class="col-sm-12">
        <h4>Processes</h4>
        <table class="table table-condensed table-hover">
            <tbody>
                @foreach ($employee->processes as $process)
                @php
                $progress = $employee->processProgress($process->id)
                @endphp
                <tr>
                    <th>
                        <a href="{{ route('admin.employee-process.show', ['employee_id' => $employee->id, 'process_id' => $process->id]) }}"
                            target="__new" rel="noopener noreferrer">
                            {{ $process->name }}
                        </a>
                    </th>
                    <td class="col-sm-6">
                        <div class="progress" title="{{ $progress }}% Complete">
                            <div class="progress-bar progress-bar-{{ $progress == 100 ? 'success' : 'warning' }} progress-bar-striped"
                                role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{ $progress }}%;">
                                <span class="sr-only"> {{ $progress }} % Complete</span>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endif