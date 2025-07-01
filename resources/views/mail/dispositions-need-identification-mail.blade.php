@component('mail::message')
# Dispositions Needing Identification

There are {{ $amount_of_records }} dispositions needing to be identified. Please review ASAP:

@component('mail::table')
| Agent Disposition | Dial Group Prefix | Records |
| ----------------- | ----------------- | ------- |
@foreach ($records as $record)
| {{ $record->agent_disposition }} | {{ $record->dial_group_prefix }} | {{ $record->records }} |
@endforeach
@endcomponent

@component('mail::button', ['url' => route('admin.dispositions.index')])
Dispositions
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
