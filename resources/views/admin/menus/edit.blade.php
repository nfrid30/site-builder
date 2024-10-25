<x-admin.layout.layout title="Edit Menu">
    <form action="{{ route('admin.menus.update', compact('menu')) }}" method="post" class="row" id="updatePage"
          enctype="multipart/form-data">
        @csrf
        @method('put')
        <x-cards.simple title="Edit menu" half>
            <x-fields.input label="Name" value="{{ $menu->name }}"/>
        </x-cards.simple>
        <div class="col-md-12"></div>
        <div class="col-md-12"></div>
        <x-cards.simple title="Blocks" full>
            <div class="sortable">
                @foreach($menu->blocks as $block)
                    <x-cards.block :$block full/>
                @endforeach
            </div>
            @if(!count($menu->blocks))
                <a href="{{ route('admin.menus.add-block', compact('menu'))}}" class="btn btn-dark">Add Block</a>
            @endif
        </x-cards.simple>
    </form>
    <div class="my-2">
        <button type="submit" class="btn btn-dark" form="updatePage">Save</button>
    </div>
    <x-modals.delete :model="$menu"/>
    <x-modals.delete-block/>
    <x-modals.add-sub-blocks/>

</x-admin.layout.layout>
@if(count($menu->blocks))
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
