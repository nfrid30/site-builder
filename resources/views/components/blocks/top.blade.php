<section class="hero">
    <div class="container">
        <div class="row text-md-start text-sm-center text-center gap-md-0 gap-sm-4 gap-5" >
            <div  data-aos="fade-up" class="col-md-6 d-flex align-items-md-start align-items-ms-center align-items-center justify-content-center flex-column" >
                <h1>{{ $block->fields['Title'] }}</h1>
                <p>{{ $block->fields['Description'] }}</p>
                <a class="btn-hover1" href="{{ $block->fields['Button']['link'] }}">{{ $block->fields['Button']['name'] }}</a>
            </div>
            <div data-aos="fade-down" class="col-md-6 position-relative d-flex flex-column justify-content-center align-items-center mt-md-0 mt-sm-5 mt-4">
                <img src="{{ $block->fields['Image'] }}" alt="hero_img1" class="moving">
                <img src="assets/images/index/hero_watch.png" alt="hero_img2">
                <img src="assets/images/icon/hero_star.png" alt="hero_icon">
            </div>
        </div>
    </div>
</section>
