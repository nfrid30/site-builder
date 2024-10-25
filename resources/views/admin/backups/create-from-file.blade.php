<x-admin.layout.layout title="Create Backup">
    <form action="{{ route('admin.backups.store-from-file') }}"
          method="post"
          enctype="multipart/form-data"
          class="row">
        @csrf
        <x-cards.simple title="Create backup" half>
            <x-fields.input label="Name" req />
            <x-fields.textarea label="Description"/>
            <div class="form-group">
                <label for="customFile">Archive</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input"
                           name="archive"
                           id="archive"
                    >
                    <label class="custom-file-label"
                           for="archive"></label>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-dark">Create</button>
            </div>
        </x-cards.simple>
    </form>
</x-admin.layout.layout>
