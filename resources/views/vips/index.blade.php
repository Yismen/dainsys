@extends('layouts.app', ['page_header'=>'Vip', 'page_description'=>'List of vips of production.'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <livewire:vips />
    </div>
</div>
@endsection

@push('scripts')
@endpush