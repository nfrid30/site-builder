<section class="finance mt-lg-4 mt-md-2 mt-sm-0 mt-0">
    <div class="container text-center">
        <h2>{{ $block->fields['Title'] }}</h2>
        <P class="mt-0">{{ $block->fields['Description'] }}</P>
        <div class="finanes-card row gap-md-0 gap-sm-4 gap-4">
            @foreach($block->showBlocks as $block)
                <div class="col-lg-4 col-md-4 d-flex justify-content-center pe-lg-3 pe-md-0 pe-sm-3 pe-3">
                <div class="fin-card" data-aos="flip-up">
                    <figure><img src=" {{ $block->fields['Icon'] }}" alt="praph"></figure>
                    <h4>{{ $block->fields['Title'] }}</h4>
                    <p class="p-f-s">{{ $block->fields['Description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
