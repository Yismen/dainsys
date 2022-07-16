@props(['responsive' => 'table-responsive'])

<div class="{{ $responsive }}">
    <table {{ $attributes->merge(['class' => 'table table-condensed']) }}>
        {{ $slot }}
    </table>
</div>