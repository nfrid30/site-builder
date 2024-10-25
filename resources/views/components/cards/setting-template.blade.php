<form action="{{ route('admin.settings.store-block', compact('setting', 'template')) }}"
      class="col-md-4 templateCard"
      method="post"
      onclick="this.submit()"
      >
    @csrf
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">{{ $template->name }}</h3>
        </div>
        <div class="card-body">
            <img class="w-100" src="{{ asset('storage/' . $template->cover) }}" alt="">
        </div>

    </div>
</form>
