@extends('layouts.app', ['page_header'=>'Plugin Dev', 'page_description'=>'Test development'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="box box-primary pad">

                <router-view name="test"></router-view>
                <router-view></router-view>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush