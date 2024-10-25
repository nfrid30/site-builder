<div class="card card-dark" id="{{ $type . $id . $templateId }}">
    <div class="card-header">
        <h3 class="card-title">{{ str($type)->ucfirst() }}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"
                    onclick="removeCard('{{ $type . $id . $templateId}}')">
                <i class="fas fa-times"></i>
            </button>
        </div>

    </div>
    <div class="card-body">
        <x-fields.input name="templates[{{ $templateId }}][options][{{ $id }}][type]"
                        value="{{ $type }}" hid/>

        <x-fields.input label="Name"
                        name="templates[{{ $templateId }}][options][{{ $id }}][name]"
                        value="{{ $value ?? '' }}"/>
    </div>
</div>
