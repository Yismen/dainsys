@props([
    'headers' => []
])

<table {{ $attributes->merge(['class' => 'table mb-0']) }}>
    @if (count($headers) > 0)

        @php
        $headers = data_fill($headers, 'hraders.label', 'sadfadf');
        // $headers = data_fill($headers, 'hraders.align', 'left');
        @endphp
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th align="{{ $header['align'] }}">{{ $header }}</th>  
                @endforeach
            </tr>
        </thead>
    @endif
    
    {{ $slot }}
    
    @isset($tfoot)
        {{ $tfoot }}
    @endisset
</table>