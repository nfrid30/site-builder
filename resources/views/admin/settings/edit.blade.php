<x-admin.layout.layout title="Edit Setting">
    <form action="{{ route('admin.settings.update', compact('setting')) }}" method="post" class="row" id="updatePage"
          enctype="multipart/form-data">
        @csrf
        @method('put')
        <x-cards.simple title="Edit Setting" half>
            <x-fields.input label="Name" value="{{ $setting->name }}"/>
        </x-cards.simple>
        <div class="col-md-12"></div>
        <div class="col-md-12"></div>
        <x-cards.simple title="Blocks" full>
            <div class="sortable">
                @foreach($setting->blocks as $block)
                    <x-cards.block :$block full/>
                @endforeach
            </div>
            @if(!count($setting->blocks))
                <a href="{{ route('admin.settings.add-block', compact('setting'))}}" class="btn btn-dark">Add Block</a>
            @endif
        </x-cards.simple>
    </form>
    <div class="my-2">
        <button type="submit" class="btn btn-dark" form="updatePage">Save</button>
    </div>
    <x-modals.delete :model="$setting"/>
    <x-modals.delete-block/>
    <x-modals.add-sub-blocks/>

</x-admin.layout.layout>
