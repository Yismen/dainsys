<x-view page-header="{{ __('Edit') }} ARSs">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <x-card>
                <x-slot name="header" class="mb-2">
                    <h4 class="row justify-content-between">
                        {{ __('Edit') }} ARS - {{ $ars->name }}
                        <x-back-to-list route="{{ route('admin.arss.index') }}" model="ARS" />
                    </h4>
                </x-slot>

                <div class="py-2">
                    {!! Form::model($ars, ['route'=>['admin.arss.update', $ars->id], 'method'=>'PATCH', 'class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>"off"]) !!}   
                    <div class="card-body">
        
                        @include('arss._form')
        
                    </div>  
                        
            
                        <div class="border-top py-3">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-warning text-uppercase">{{ __('Update') }}</button>
                            </div>
                        </div>
                    {!! Form::close() !!}     
                </div> 
            
                <x-slot name="footer">
                    <delete-request-button
                        class="float-right"
                        url="{{ route('admin.arss.destroy', $ars->id) }}"
                        redirect-url="{{ route('admin.arss.index') }}"
                    ></delete-request-button>
                </x-slot> 
            </x-card> 
        </div>    
    </div>    
</x-view>

@push('scripts')

@endpush
