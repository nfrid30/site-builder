<x-admin.layout.layout title="Edit Page">
    <form action="{{ route('admin.pages.update', compact('page')) }}" method="post" class="row" id="updatePage"
          enctype="multipart/form-data">
        @csrf
        @method('put')
        <x-cards.simple title="Edit page" half>
            <x-fields.input label="Name" :value="$page->name"/>
            <x-fields.input label="Path" :value="$page->path"/>
        </x-cards.simple>
        <div class="col-md-12"></div>
        <x-cards.simple title="Edit Meta" half>
            <x-fields.input label="Meta Title" :value="$page->meta_title"/>
            <x-fields.textarea label="Meta Description" :value="$page->meta_description"/>
            <x-fields.input label="Meta Keywords" :value="$page->meta_keywords"/>
            <x-fields.image label="Meta Image" :value="$page->meta_image"/>
        </x-cards.simple>
        <div class="col-md-12"></div>
        <x-admin.tags :currentTags="$page->tags"/>
        <div class="col-md-12"></div>
        <x-cards.simple title="Blocks" full>
            <div class="sortable">
                @foreach($page->blocks as $block)
                    <x-cards.block :$block full/>
                @endforeach
            </div>
            <a href="{{ route('admin.pages.add-block', compact('page'))}}" class="btn btn-dark">Add Block</a>
        </x-cards.simple>
    </form>
    <div class="my-2">
        <button type="submit" class="btn btn-dark" form="updatePage">Save</button>
    </div>
    <x-modals.delete :model="$page"/>
    <x-modals.delete-block/>
    <x-modals.add-sub-blocks/>

</x-admin.layout.layout>
@if(count($page->blocks))
    <script>
        $(function () {
            $(".sortable").sortable({
                handle: ".header-handle",
                update: function (event, ui) {
                    let sortDom = document.querySelectorAll(".sort-order")
                    let sortArray = [];
                    for (let i = 0; i < sortDom.length; i++) {
                        sortArray.push({'id': sortDom[i].value, 'sort': i})
                    }

                    let response = fetch('{{ route('admin.sort') }}', {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8',
                            'X-CSRF-Token': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({'sort': sortArray, 'model': '{{ class_basename($block) }}'})
                    })

                }
            });
        });
    </script>
@endif
