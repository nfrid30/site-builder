<div class="form-group">
    <label for="customFile">{{ $label }}</label>
    <div class="custom-file">
        <input type="hidden" name="{{ $name ?? str($label)->snake()->toString() }}" value="{{ $value }}">
        <input type="file" class="custom-file-input"
               name="{{ $name ?? str($label)->snake()->toString() }}"
               id="{{ str($label)->snake()->toString() }}" onchange="showImage('{{ str($label)->snake()->toString() }}-image-{{ $id ?? '' }}')">
        <label class="custom-file-label"
               for="{{ str($label)->snake()->toString() }}">{{ $value ?? '' }}</label>
    </div>
    <div class="my-2 w-50">
        <img src="{{ asset('storage/' . ($value ?? '')) }}"
             alt=""
             class="w-75"
             id="{{ str($label)->snake()->toString() }}-image-{{ $id ?? '' }}">
    </div>
    @error($name ?? str($label)->snake()->toString())
    {{$message}}
    @enderror
</div>
<script>
    function showImage(id) {
        let selectedFile = event.target.files[0];
        let reader = new FileReader();

        let imgTag = document.getElementById(id);

        reader.onload = function (event) {
            imgTag.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
    }
</script>
