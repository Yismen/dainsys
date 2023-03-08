@extends('layouts.app', ['page_header'=>'Dashboard', 'page_description'=>'Ring Central Manager'])

@section('content')
<div class="container-fluid">
    <livewire:dashboards.ring-central.manager />
</div>
@endsection

@push('scripts')
@endpush