<x-fields.input :label="$label . 'Name'" :name="$name . '[name]'" :value="$value['name'] ?? ''"/>

<label for="">{{ $label . 'Link' }}</label>
<select class="form-control" name="{{ $name . '[link]' }}" id="">
    @foreach($pages as $page)
        <option @selected($page->id == ($value['link'] ?? ''))
                value="{{ $page->id }}">{{ $page->name }}</option>
    @endforeach
</select>
