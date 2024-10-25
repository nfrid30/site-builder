<section class="news-cards">
    <div class="container">
        <h2 class="text-center news-h2">{{ $block->fields['Title'] }}</h2>
        <P class="text-center news-p">{{ $block->fields['Description'] }}</P>
        <div class="row d-flex gap-md-0 gap-sm-5 gap-4 mb-5">
            @foreach($block->pages ?? [] as $page)
                <div class="col-lg-4 col-md-4 d-flex" data-aos="flip-right">
                    <div class="card news-card-back">
                        <img src="{{ $page->meta_image }}" alt="card-img">
                        <div class="card-body">
                            <a href="{{ $page->path }}">
                                <h5>{{ $page->name }}</h5>
                            </a>
                            <p class="card-text p-f-s">{{ $page->meta_description }}</p>
                        </div>
                        <hr class="dotted-line">
                        <div class="card-viewer d-flex justify-content-between ">
                            <div>
                                <i class="fa-solid fa-calendar-days"></i>
                                <span>{{$page->created_at->format('Y/m/d')}}</span>
                            </div>
                            <div>
                                <i class="fa-regular fa-message"></i>
                                <span>0</span>
                            </div>
                        </div>
                        <div class="news-link">
                            <a class="btn-hover1" href="{{ $page->path }}">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
