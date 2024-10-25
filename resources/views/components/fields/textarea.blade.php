<div class="form-group">
    @if(!isset($hid))
        <label for="">{{ $label }}</label>
    @endif
    <textarea
        @isset($hid)
            type="hidden"
        @else
            type="text"
        @endisset
        name="{{ $name ?? str($label)->snake()->toString() }}"
        class="form-control"
        @isset($req) required @endisset>{{ $value ?? '' }}</textarea>
    @error($name ?? str($label)->snake()->toString())
    {{$message}}
    @enderror
</div>
