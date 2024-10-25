<x-admin.layout.layout title="Backups">
    <a type="button" class="btn btn-dark"
       href="{{ route('admin.backups.create') }}">Create Backup</a>

        <a type="button" class="btn btn-dark mx-2"
           href="{{ route('admin.backups.create-from-file') }}">Create From File</a>

        <x-tables.simple
            :collection="$backups"
            :fields="['id', 'name', 'from_file', 'created_at']"
            edit
        />
</x-admin.layout.layout>
