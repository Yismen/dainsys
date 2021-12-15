@props([
    'headers' => []
])

<table {{ $attributes->merge(['class' => 'table mb-0']) }}>
    @if (count($headers) > 0)
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th>{{ $header }}</th>  
                @endforeach
            </tr>
        </thead>
    @endif
    
    {{ $slot }}
    
    @isset($tfoot)
        {{ $tfoot }}
    @endisset
</table>