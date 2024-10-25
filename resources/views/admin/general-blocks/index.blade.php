<x-admin.layout.layout title="General Blocks">
    <form action="{{route('admin.general-blocks.update')}}" method="post">
        @method('PUT')
        @csrf

        <x-cards.simple title="Blocks" full>
            <div class="sortable">
                @foreach($blocks as $block)
                    <x-cards.block :$block full general dontShow dontSort dontDelete />
                @endforeach
            </div>
        </x-cards.simple>
        <div class="my-2">
            <button type="submit" class="btn btn-dark">Save</button>
        </div>
    </form>
    <x-modals.add-sub-blocks/>
    <x-modals.delete-block/>
</x-admin.layout.layout>
@if(count($blocks))
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
