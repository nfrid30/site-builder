<li class="dropdown">
    <a class="nav-link " href="#">{{ $block->fields['Name'] }} <i
            class="fa-sharp fa-solid fa-sort-down"></i></a>
    <ul class="dropdown-menu">
        @foreach($block->showBlocks ?? [] as $oneBlock)
            <li><a class="dropdown-item" href="{{ $oneBlock->fields['Link'] }}">{{ $oneBlock->fields['Name'] }}</a></li>
        @endforeach

    </ul>
</li>
