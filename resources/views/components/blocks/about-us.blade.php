<div class="services  pb-lg-4 pb-md-2 pb-sm-0 pb-0 mb-lg-2 mb-md-1 mb-sm-0 mb-0">
    <div class="container">
        <div class="row gap-md-0 gap-sm-4 gap-4">
            <div class="col-lg-6 col-md-6 aos-init aos-animate" data-aos="fade-up">
                <h2 class="text-lg-start text-md-start text-sm-center text-center">{{ $block->fields['Title'] }}</h2>
                <p class="text-lg-start text-md-start text-sm-center text-center mt-lg-4 mt-md-2 mt-sm-2 mt-2 pb-4 ">
                    {{ $block->fields['Description'] }}</p>

                <div class="serives-btn justify-content-md-start justify-content-ms-center justify-content-center d-flex pt-lg-4 pt-md-2 pt-sm-2 pt-2">
                    <a class="btn-hover1" href="{{ $block->fields['Button']['link'] }}">{{ $block->fields['Button']['name'] }}</a>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center abt aos-init aos-animate" data-aos="fade-down">
                <div class="position-relative">
                    <figure class="abut-hero-img1"><img src="{{ $block->fields['Image'] }}" alt="img"></figure>
                    <figure class="abut-hero-img2"><img src="assets/images/icon/whitStar.png" alt="img"></figure>
                </div>
            </div>
        </div>
    </div>
</div>
