<x-admin.layout.layout title="Tags">
    <a type="button" class="btn btn-dark" href="{{ route('admin.tags.create') }}">Create tag</a>
<x-tables.simple
    :collection="$tags"
    :fields="['id', 'name']"
    edit
/>
</x-admin.layout.layout>
