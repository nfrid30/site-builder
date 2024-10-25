<x-admin.layout.layout title="Menus">
    <a type="button" class="btn btn-dark" href="{{ route('admin.menus.create') }}">Create menu</a>
<x-tables.simple
    :collection="$menus"
    :fields="['id', 'name']"
    edit off
/>
</x-admin.layout.layout>
