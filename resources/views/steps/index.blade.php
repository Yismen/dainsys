@extends('layouts.app', ['page_header'=>'Step', 'page_description'=>'List of steps of production.'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <livewire:steps />
    </div>
</div>
@endsection

@push('scripts')
@endpush