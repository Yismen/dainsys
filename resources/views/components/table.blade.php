@props(['responsive' => 'table-responsive'])

<div class="{{ $responsive }}">
    <table {{ $attributes->merge(['class' => 'table table-condensed table-bordered']) }}>
        {{ $slot }}
    </table>
</div>