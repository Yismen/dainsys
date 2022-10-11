@inject('layout', 'App\Models\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Dispositions', 'page_description'=>'Dispositions management'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <livewire:disposition-form />

            <livewire:disposition-unidentified-table />

            <livewire:disposition-table />


        </div>
    </div>
</div>
@endsection