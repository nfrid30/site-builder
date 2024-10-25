<x-admin.layout.layout title="Edit Template">
    <form action="{{ route('admin.templates.update', compact('template')) }}" method="post" class="row"
          id="templateForm">
        @csrf
        @method('put')
        <x-cards.simple title="Edit template" half>
            <x-fields.input label="Name" :value="$template->name" req/>
            <x-fields.input label="Slug" :value="$template->slug" req/>
        </x-cards.simple>
        <x-cards.simple title="Cover" half>
            <img src="{{asset('storage/' . $template->cover)}}" class="w-100" alt="cover">
        </x-cards.simple>

        <div class="col-md-12"></div>
        <x-templates.options :$template />
        @if($template->template)
            <x-templates.options :template="$template->template"/>
        @endif
    </form>

    <button type="submit" form="templateForm" class="btn btn-dark">Save</button>
    @if(!$template->template)
        <form action="{{ route('admin.templates.add-level', compact('template')) }}" method="post" class="d-inline">
            @csrf
            <button class="btn btn-dark">Add Level</button>
        </form>
    @endif
    <x-modals.delete :model="$template"/>

</x-admin.layout.layout>

<script>
    function addField(wrapperId, type, templateId) {
        const wrapper = document.querySelector('#' + wrapperId)
        let randId = getRandomInt(100, 999)
        let element = document.createElement('div')
        element.innerHTML = `<x-cards.template-field type="${type}" id="${randId}" templateId="${templateId}"/>`
        wrapper.append(element);
    }

    function getRandomInt(min, max) {
        const minCeiled = Math.ceil(min);
        const maxFloored = Math.floor(max);
        return Math.floor(Math.random() * (maxFloored - minCeiled) + minCeiled);
    }

    function removeCard(cardId) {
        setTimeout(() => document.querySelector('#' + cardId).remove(), 700);
    }
</script>
