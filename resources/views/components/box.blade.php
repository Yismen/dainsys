@props(['type', 'headerClasses'])
<div {{ $attributes->merge(['class' => 'card card-' . $type]) }}>
    @isset($header)
    <div class="card-header with-border {{ $headerClasses ?? '' }}">
        {{ $header }}
    </div>
    @endisset

    <div class="card-body">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>