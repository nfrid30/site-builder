<x-admin.layout.layout title="Pages">
    <a type="button" class="btn btn-dark" href="{{ route('admin.pages.create') }}">Create page</a>
<x-tables.simple
    :collection="$pages"
    :fields="['id', 'name', 'path']"
    edit off
    link="path"
    api="path"
/>
</x-admin.layout.layout>
