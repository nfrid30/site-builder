<li class="nav-item">
    <a class="nav-link @if($block->fields['Link'] === request()->getRequestUri())  active @endif" href="{{ $block->fields['Link'] }}">{{ $block->fields['Name'] }}</a>
</li>
