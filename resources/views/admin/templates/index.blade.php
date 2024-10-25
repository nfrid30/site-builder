<x-admin.layout.layout title="Templates">
    <a type="button" class="btn btn-dark"
       href="{{ route('admin.templates.create') }}">Create Template</a>

    @foreach($types as $type => $templates)
        <h3 class="my-4" >{{$type}}</h3>
        <x-tables.simple
            :collection="$templates"
            :fields="['id', 'name', 'slug']"
            edit
            image="cover"
        />
    @endforeach

</x-admin.layout.layout>
