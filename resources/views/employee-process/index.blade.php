@inject('layout', 'App\Models\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Employe Process', 'page_description'=>'Employee-Process association management'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <livewire:employee-process />
    </div>
</div>
@endsection

@push('scripts')
@endpush