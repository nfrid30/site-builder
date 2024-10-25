<x-admin.layout.layout title="Add Block">
    <div class="row">
        @foreach($templates as $template)
            <x-cards.setting-template :$template :$setting />
        @endforeach
    </div>
</x-admin.layout.layout>
