@props(['type', 'headerClasses'])
<div {{ $attributes->merge(['class' => 'box box-' . $type]) }}>
    @isset($header)
    <div class="box-header with-border {{ $headerClasses ?? '' }}">
        {{ $header }}
    </div>
    @endisset

    <div class="box-body">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="box-footer">
            {{ $footer }}
        </div>
    @endisset
</div>