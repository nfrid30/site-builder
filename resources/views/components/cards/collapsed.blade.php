<div @isset($half) class="col-md-6" @endisset
    @isset($full) class="col-md-12" @endisset>
    <div class="card card-dark collapsed-card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                </button>
            </div>

        </div>

        <div class="card-body" style="display: none;">
            {{ $slot }}
        </div>

    </div>
</div>

