@props(['pageHeader', 'appLayout'])

@inject('layout', $appLayout ?? 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=> $pageHeader, 'page_description'=> $pageDescription ?? $pageHeader])

@section('content')
    {{ $slot }}
@endsection