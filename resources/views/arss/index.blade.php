<x-view page-header="ARSs">            
   <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <h3 class="d-flex justify-content-between">
                {{ __('List') }} ARSs
                <a href="/admin/arss/create" class="text-sm mr-5">
                    <i class="fa fa-plus"></i> {{ __('Add') }}
                </a>
            </h3>
            <form action="/admin/arss/employees" method="POST">
                @csrf
                <div class="row justify-content-center">
                    @if ($free_employees->count() > 0)
                        <x-card class="col-12 card-danger">
                            <x-slot name="header">
                                <h5>
                                    {{ __('List of Employees Not Assigned to') }} ARSs
                                    <span class="badge bg-yellow">{{ $free_employees->count() }}</span>
                                </h5>
                            </x-slot>                        

                            <table class="table table-sm table-hover px-2">
                                <tbody>
                                    @foreach ($free_employees->split(2) as $split)
                                        <tr>
                                            @foreach ($split as $employee)
                                                <td class="w-50">
                                                    <div class="form-check form-check-inline">
                                                        <input name="employee[]" class="form-check-input" type="checkbox" id="free_employee_{{ $employee->id }}" value="{{ $employee->id }}">
                                                        <label class="form-check-label text-bold cursor-pointer" for="free_employee_{{ $employee->id }}">{{ $employee->full_name }}</label>
                                                  </div>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </x-card>
                    @endif
                    
                    @foreach ($arss as $ars)
                        @if ($ars->employees->count() > 0)
                            <x-card class="col-12">
                                <x-slot name="header">
                                    <h5>
                                        <a href="{{ route('admin.arss.show', $ars->id) }}">{{ $ars->name }}</a>
                                        <span class="badge bg-yellow">{{ $ars->employees->count() }}</span>
                                        <a href="{{ route('admin.arss.edit', $ars->id) }}" class="float-right text-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </h5>
                                </x-slot>
                                
                                <div class="d-flex">
                                    @foreach ($ars->employees->split(2) as $split)
                                        <div class="w-50">
                                            <x-table.table class="table-sm table-bordered px-2">
                                                <tbody>
                                                    @foreach ($split as $employee)
                                                        <tr>
                                                            <td class="{{ $split->first() ? '' : 'border-top' }}">
                                                                <div class="form-check form-check-inline ">
                                                                    <input class="form-check-input" type="checkbox" name="employee[]" id="employee_{{ $employee->id }}" value="{{ $employee->id }}">
                                                                    <label class="form-check-label text-bold cursor-pointer" for="employee_{{ $employee->id }}">{{ $employee->full_name }}</label>
                                                                </div>
                                                            </td>
                                                        </tr>                                            
                                                    @endforeach  
                                                </tbody>
                                            </x-table>
                                        </div>
                                    @endforeach
                                </div>
                                
                            </x-card>
                        @endif
                    @endforeach
                </div>
                
                <x-floating-div>
                    <div class="input-group">
                        <x-fields.select 
                            field-name="ars" 
                            :items="$arss->pluck('name', 'id')"
                        ></x-fields.select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-warning">{{ __('Assign') }}</button>
                        </div>
                    </div>
                            
                    <x-errors-div></x-errors-div>
                </x-floating-div>
            </form>
        </div>
   </div>
</x-view>

@push('scripts')
@endpush
