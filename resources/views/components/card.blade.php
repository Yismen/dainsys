@props(['header', 'footer'])

<div {{ $attributes->merge(['class' => 'card p-0 card-primary card-outline']) }}>
    <div class="card-header">
        {{ $header }}
    </div>
    <div class="card-body p-0">
        {{ $slot }}
    </div>
    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>