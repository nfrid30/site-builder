<section class="question pb-lg-1 pb-md-2 pb-sm-4 pb-4">
    <div class="container">
        <div class="row">
            <div class="question-text col-lg-6 col-md-6 tab-center" data-aos="fade-up">
                <h2 class="text-lg-start text-md-start text-sm-center text-center"
                >{{ $block->fields['Title'] ?? '' }}
                </h2>
                <P class="text-lg-start text-md-start text-sm-center text-center mt-md-3 mt-3"
                >{{ $block->fields['Description'] ?? '' }}</P>
                <div class="text-lg-start text-md-start text-sm-center text-center ">
                    <a class="btn-hover1" href="{{ $block->fields['Button']['link'] ?? ''}}"
                    >{{ $block->fields['Button']['name'] ?? '' }}</a>
                </div>
            </div>
            <div class="question-collapes col-lg-6 col-md-6 mt-md-0 mt-sm-3 mt-3" data-aos="zoom-in">
                <div class="accordion" id="accordionExample">
                    @foreach($block->showBlocks ?? [] as $block)
                        <div class="accordion-item">
                            <h5 class="accordion-header" id="headingOne-{{ $block->id }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne-{{ $block->id }}" aria-expanded="true"
                                        aria-controls="collapseOne">
                                    {{ $block->fields['Question'] ?? '' }}
                                </button>
                            </h5>
                            <div id="collapseOne-{{ $block->id }}"
                                 class="accordion-collapse collapse @if($loop->index === 0) show @endif"
                                 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p> {{ $block->fields['Answer'] ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
