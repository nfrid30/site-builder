<div
    @isset($half) class="col-md-6" @endisset
    @isset($full) class="col-md-12" @endisset>
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            {{ $slot }}
        </div>

    </div>
</div>
