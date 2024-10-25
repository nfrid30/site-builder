<x-web.layout :$menus :$page :$settings>
    @foreach($page->showBlocks ?? [] as $block)
        <x-dynamic-component :component="'blocks.' . $block->template->slug" :$block/>
    @endforeach
</x-web.layout>
