@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Pagination', 'page_description'=>'Test pagination plugin'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="card card-primary card-outline pad">
                    <div class="card-header with-boarder">Pagination Test</div>

                    <div class="card-body">
                    
                        <transition
                                enter-active-class="slideInLeft"
                                {{-- enter-class="slideInLeft"
                                leave-class="fadeOut" --}}
                                leave-active-class="fadeOutUp"
                            >
                            <router-view class="animated" name="pagination"></router-view>
                        </transition>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush