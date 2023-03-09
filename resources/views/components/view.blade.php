@props(['pageHeader', 'appLayout'])

@extends('layouts.app', ['page_header'=> $pageHeader, 'page_description'=> $pageDescription ?? $pageHeader])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div {{ $attributes->merge(['class' => 'col-sm-8 col-sm-offset-2']) }}>
            {{ $slot }}
        </div>
    </div>
</div>
@endsection