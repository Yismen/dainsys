<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ $label }}
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
        @foreach ($links as $link)
        <li>
            <a href="{{ $link['route'] }}" @if ($target || isset($link['target']))
                target="{{ $link['target'] ?? '_New' }}" @endif>{{
                __($link['text'])
                }}</a>
        </li>
        @endforeach
    </ul>
</div>