<x-admin.layout.layout title="Templates">
    <a type="button" class="btn btn-dark"
       href="{{ route('admin.templates.general-create') }}">Create Template</a>

        <h3 class="my-4" >GENERAL</h3>
        <x-tables.simple
            :collection="$templates"
            :fields="['id', 'name', 'slug']"
            edit
            image="cover"
        />

</x-admin.layout.layout>
