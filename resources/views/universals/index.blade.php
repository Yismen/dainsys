@inject('layout', 'App\Models\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Universal', 'page_description'=>'List of universals of production.'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <livewire:universals />
    </div>
</div>
@endsection

@push('scripts')
@endpush