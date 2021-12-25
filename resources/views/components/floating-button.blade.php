@props([
    'field_name',
    'label' => __('Create'),
    'items' => [],
])

<x-floating-div>
    <div class="input-group">
        <x-fields.select 
            :field-name="$fieldName" 
            :items="$items"
        ></x-fields.select>
        <div class="input-group-append">
            <button type="submit" class="btn btn-warning">{{ $label }}</button>
        </div>
    </div>
            
    <x-errors-div></x-errors-div>
</x-floating-div>