@props([
    'top' => '40%',
    'right' => '10%',
])

<div 
    {{ $attributes->merge(['class' => 'bg-gray-light border col-sm-3 col-xs-7 p-3 position-fixed shadow w-auto h-auto']) }} 
    style="right: {{ $right }}; top: {{ $top }}; max-width: 50%; max-height: 70vh; overflow: auto;"
>    
    {{ $slot }}
</div>