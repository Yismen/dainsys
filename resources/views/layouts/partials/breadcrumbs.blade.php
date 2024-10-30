<ol class="breadcrumb">
    @php
        $link = '/';
    @endphp
    @foreach (explode('/', request()->path()) as $value)
        @php
            $link = $link.$value.'/';
        @endphp
        @if ($loop->last)
            <li class="active">{{ ucwords(trim(str($value)->replace('_', ' ',))) }}</li>
        @else
            <li>
                <a href="{{ rtrim($link, '/') }}">{{ ucwords(trim(str($value)->replace('_', ' ',))) }}</a>
            </li>
        @endif
    @endforeach
</ol>
