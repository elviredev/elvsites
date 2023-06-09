@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp

<div @class(["form-group", $class])>
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>

    <select class="form-select" name="{{ $name }}" id="{{ $name }}" >
        <option value="">---</option>
        @foreach($categories as $category)
            <option @selected(old($name, $site->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
