<x-admin.layout.layout title="Settings">
    <a type="button" class="btn btn-dark" href="{{ route('admin.settings.create') }}">Create Setting</a>
<x-tables.simple
    :collection="$settings"
    :fields="['id', 'name']"
    edit
/>
</x-admin.layout.layout>
