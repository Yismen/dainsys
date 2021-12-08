<ol class="breadcrumb float-sm-right">
    @php
        $link = '/';
    @endphp
    @foreach (explode('/', request()->path()) as $value)
        @php
            $link = $link.$value.'/';
        @endphp
        @if ($loop->last)
            <li class="active breadcrumb-item">{{ ucwords(trim(str_replace('_', ' ', $value))) }}</li>
        @else
            <li class="breadcrumb-item">
                <a href="{{ rtrim($link, '/') }}">{{ ucwords(trim(str_replace('_', ' ', $value))) }}</a>
            </li>
        @endif
    @endforeach
</ol>
