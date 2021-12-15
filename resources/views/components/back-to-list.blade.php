@props(['route', 'model', 'label' => 'List'])

<a 
    href="{{ $route }}" 
    {{ $attributes->merge(['class' => 'text-sm']) }}
    title="{{ __('Back To') }}  {{ __($label) }} {{ Illuminate\Support\Str::plural($model) }}"
>
    <i class="fa fa-home"></i> {{ __($label) }}
</a>