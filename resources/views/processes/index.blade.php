@extends('layouts.app', ['page_header'=>'Process', 'page_description'=>'List of processes of production.'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <livewire:processes />
    </div>
</div>
@endsection

@push('scripts')
@endpush