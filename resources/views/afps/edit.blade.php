<x-view page-header="{{ __('Edit') }} AFPs">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <x-card>
                <x-slot name="header" class="mb-2">
                    <h4 class="row justify-content-between">
                        {{ __('Edit') }} AFP - {{ $afp->name }}
                        <x-back-to-list route="{{ route('admin.afps.index') }}" model="AFP" />
                    </h4>
                </x-slot>

                <div class="py-2">
                    {!! Form::model($afp, ['route'=>['admin.afps.update', $afp->id], 'method'=>'PATCH', 'class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>"off"]) !!}   
                    <div class="card-body">
        
                        @include('afps._form')
        
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
                        url="{{ route('admin.afps.destroy', $afp->id) }}"
                        redirect-url="{{ route('admin.afps.index') }}"
                    ></delete-request-button>
                </x-slot> 
            </x-card> 
        </div>    
    </div>    
</x-view>

@push('scripts')

@endpush
