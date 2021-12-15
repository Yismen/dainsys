@props([
    'field_name',
    'items' => [],
])

<div {{ $attributes->merge(['class' => 'bg-gray-light border col-sm-3 col-xs-7 fixed p-3 position-fixed shadow']) }} style="bottom: 35%; right: 30px;">
    <div class="input-group">
        <x-fields.select 
            :field-name="$fieldName" 
            :items="$items"
        ></x-fields.select>
        <div class="input-group-append">
            <button type="submit" class="btn btn-warning">{{ $slot }}</button>
        </div>
    </div>
    @if ($errors->any())
        <div class="mt-2">
            <x-errors-div></x-errors-div>
        </div>
    @endif
</div>