<div class="form-group">
    @if(!isset($hid))
        <label for="">{{ $label }}</label>
    @endif
    <input
        @isset($hid)
            type="hidden"
        @else
            type="text"
        @endisset
        name="{{ $name ?? str($label)->snake()->toString() }}"
        class="form-control"
        value="{{ $value ?? '' }}"
        @isset($req) required @endisset>
    @error($name ?? str($label)->snake()->toString())
    {{$message}}
    @enderror
</div>
