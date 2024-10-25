<x-admin.layout.layout title="Edit Backup">
    <form action="{{ route('admin.backups.update', compact('backup')) }}"
          method="post"
          class="row">
        @csrf
        @method('put')
        <x-cards.simple title="Edit page" half>
            <x-fields.input label="Name" value="{{ $backup->name }}" req />
            <x-fields.textarea label="Description" value="{{ $backup->description }}" req />
            <div>
                <button type="submit" class="btn btn-dark">Save</button>
                <button type="submit" form="restore" class="btn btn-dark">Restore</button>
                <a type="submit" href="{{ route('admin.backups.download', compact('backup')) }}" class="btn btn-dark">Download</a>
            </div>
        </x-cards.simple>
    </form>
    <x-modals.delete :model="$backup" />
</x-admin.layout.layout>
<form action="{{ route('admin.backups.restore', compact('backup')) }}"
      method="post"
      id="restore"
>
    @csrf
</form>
