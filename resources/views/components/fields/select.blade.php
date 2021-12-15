@props([
    'field-name',
    'items' => []
])

<select 
    name="{{ $fieldName }}" 
    id="{{ $fieldName }}" 
    {{ $attributes->merge(['class' => 'form-control']) }}
>
    <option value="">-- {{ __('Please select one') }} --</option>
    @foreach ($items as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>