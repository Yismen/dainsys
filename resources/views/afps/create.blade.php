<x-view page-header="{{ __('Create') }} AFPs">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <x-card>
                <x-slot name="header">
                    <h4 class="row justify-content-between">
                        {{ __("Add") }} AFP
                        <x-back-to-list route="{{ route('admin.afps.index') }}" model="AFP" />
                    </h4>
                </x-slot>

                <div class="py-2">
                    {!! Form::open(['route'=>['admin.afps.store'], 'method'=>'POST', 'class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>"off"]) !!}
                        <div class="card-body">
            
                            @include('afps._form')
            
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
