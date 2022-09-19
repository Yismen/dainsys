@component('mail::message')
# {{ $title }}

Please see attached the report for {{ $title }}!

Thanks,<br>
{{ config('app.name') }}
@endcomponent