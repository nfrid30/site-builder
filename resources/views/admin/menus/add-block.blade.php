<x-admin.layout.layout title="Add Block">
    <div class="row">
        @foreach($templates as $template)
            <x-cards.menu-template :$template :$menu />
        @endforeach
    </div>
</x-admin.layout.layout>
