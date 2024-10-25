@php use App\Enums\TemplateTypeEnum; @endphp

<x-admin.layout.layout title="Create Template">
    <form action="{{ route('admin.templates.general-store') }}" method="post" class="row" enctype="multipart/form-data">
        @csrf
        <x-cards.simple title="Create template" half>
            <x-fields.input name="type" :value="\App\Enums\TemplateTypeEnum::PAGE->value" hid/>
            <x-fields.input label="Name" req/>

            <div class="form-group">
                <label for="customFile">Cover</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="cover" id="customFile">
                    <label class="custom-file-label" for="customFile"></label>
                </div>
                @error('cover')
                    {{$message}}
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-dark">Create</button>
            </div>
        </x-cards.simple>
    </form>
</x-admin.layout.layout>
