<x-admin.layout.layout title="Create Backup">
    <form action="{{ route('admin.backups.store') }}"
          method="post"
          class="row">
        @csrf
        <x-cards.simple title="Create backup" half>
            <x-fields.input label="Name" req />
            <x-fields.textarea label="Description"/>
            <div>
                <button type="submit" class="btn btn-dark">Create</button>
            </div>
        </x-cards.simple>
    </form>
</x-admin.layout.layout>
