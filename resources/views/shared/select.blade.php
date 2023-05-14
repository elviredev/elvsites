@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>

    <select name="{{ $name }}" id="{{ $name }}" >
        <option value="">Sélectionner une catégorie</option>
        @foreach($categories as $category)
            <option @selected(old('category_id', $site->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
