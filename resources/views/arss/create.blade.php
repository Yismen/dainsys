<x-view page-header="{{ __('Create') }} ARSs">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <x-card>
                <x-slot name="header">
                    <h4 class="row justify-content-between">
                        {{ __("Add") }} ARS
                        <x-back-to-list route="{{ route('admin.arss.index') }}" model="ARS" />
                    </h4>
                </x-slot>

                <div class="py-2">
                    {!! Form::open(['route'=>['admin.arss.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>"off"]) !!}
                        <div class="card-body">
            
                            @include('arss._form')
            
                        </div>

                        <div class="border-top p-3">
                            <button type="submit" class="btn btn-primary text-uppercase">{{ __("Create") }}</button>
                            <button type="reset" class="btn btn-secondary">{{ __('Cancel') }}</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </x-card>
        </div>
    </div>
</x-view>

@push('scripts')

@endpush
