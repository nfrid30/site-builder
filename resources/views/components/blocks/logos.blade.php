<div class="ispsum-logo">
    <div class="container">
        <hr>
        <div class="logo_ispsum_slider">
            @foreach($block->showBlocks ?? [] as $block)
                <a href="#">
                    <figure><img src="{{ $block->fields['Logos'] }}" alt="img"></figure>
                </a>
            @endforeach
        </div>
        <hr>
    </div>
</div>
