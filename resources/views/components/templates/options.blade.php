<x-cards.simple title="Options" half>
    <div class="row">
        <div class="col-3">
            @foreach(\App\Enums\InputTypeEnum::cases() as $inputType)
                <div class="mt-1">
                    <button type="button"
                            onclick="addField('wrapper-{{ $template->id }}', '{{ $inputType->value }}', {{ $template->id }})"
                            class="btn btn-dark w-100">{{ $inputType->name() }}</button>
                </div>
            @endforeach
        </div>
        <div class="col-9 border p-1" id="wrapper-{{ $template->id }}">
            <x-fields.input name="templates[{{ $template->id }}][id]"
                            value="{{ $template->id }}" hid/>
            @foreach($template->options ?? [] as $option)
                <x-cards.template-field :type="$option['type']"
                                        :id="$loop->iteration"
                                        :value="$option['name']"
                                        :templateId="$template->id"
                />
            @endforeach
        </div>
    </div>
</x-cards.simple>
