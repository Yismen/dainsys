@props([
    'title', 
])

<div {{ $attributes->merge(['class' => 'box']) }}>
    <div class="box-header with-border">
            {{ $header }}
    </div>

    <div class="box-body">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="box-footer">
            {{ $footer }}
        </div>
    @endisset
</div>