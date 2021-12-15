
<x-view page-header="{{ __('Details') }} AFPs">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-sm-offset-2">
            <x-card>
                <x-slot name="header">
                    <h4 class="row justify-content-between px-2">
                        {{ __('Details') }} - {{ $afp->name }}
                        <div>
                            <x-back-to-list route="{{ route('admin.afps.index') }}" model="AFP" />
                        </div>
                    </h4>
                </x-slot>

                <div class="info-box mb-0">
                    <span class="info-box-icon bg-green"><i class="fa fa-star"></i></span>

                    <div class="info-box-content">
                        <p class="info-box-text">
                            {{ $afp->name }}
                            <a href="{{ route('admin.afps.edit', $afp->id) }}" class="text-warning" title="{{ __('Edit') }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </p>

                        <p class="m-0">ID: <strong> {{ $afp->id }}</strong></p>
                        <p class="m-0">{{ __('Employees') }}: <strong> {{ count($afp->employees) }}</strong></p>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </x-card>

            <x-card type="card-light">
                <x-slot name="header">
                    <h5>
                        {{ __('Employees') }}
                    </h5>
                </x-slot>

                @if(count($afp->employees))
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Photo') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($afp->employees as $employee)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.employees.show', $employee->id) }}">{{ $employee->id }}</a>
                                        </td>
                                        <td>
                                            {{ $employee->full_name }}
                                        </td>
                                        <td class="col-xs-2">
                                            <a href="{{ asset($employee->photo) }}" target="_new">
                                                <img src="{{ asset($employee->photo) }}" height="30px" alt="Image">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </x-card>
        </div>
    </div>
</x-view>
@push('scripts')

@endpush
