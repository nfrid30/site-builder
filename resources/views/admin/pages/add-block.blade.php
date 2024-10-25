<x-admin.layout.layout title="Add Block">
    <div class="row">
        @foreach($templates as $template)
            <x-cards.template :$template :$page />
        @endforeach
    </div>
</x-admin.layout.layout>
