<x-admin.layout.layout title="Create Setting">
    <form action="{{ route('admin.settings.store') }}" method="post" class="row">
        @csrf
        <x-cards.simple title="Create Setting" half>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div>
                <button type="submit" class="btn btn-dark">Create</button>
            </div>
        </x-cards.simple>
    </form>
</x-admin.layout.layout>
