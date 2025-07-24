<ol class="breadcrumb">
    @php
        $link = '/';
    @endphp
    @foreach (explode('/', request()->path()) as $value)
        @php
            $link = $link.$value.'/';

            $text = str($value)->trim()->replace(['-', '_'], ' ')->title()->toString();
        @endphp
        @if ($loop->last)
            @php
                $link = rtrim($link, '/');
            @endphp
            <li>
                <a href="{{ $link }}" class="active">{{ $text }}</a>
            </li>
        @else
            <li>
                <a href="{{ $link }}" class="">{{ $text }}
                    {{-- <i class="fa fa-angle-double-right" aria-hidden="true"></i> --}}
                </a>
            </li>
        @endif
    @endforeach
</ol>
