@component('mail::message')
# Dispositions Needing Identification

There are {{ $records }} dispositions needing to be identified. Please review ASAP.

@component('mail::button', ['url' => route('admin.dispositions.index')])
Dispositions
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent