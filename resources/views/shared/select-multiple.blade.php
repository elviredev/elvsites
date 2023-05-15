@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp

<div @class(["form-group", $class])>
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>

    <select class="form-select" name="{{ $name }}[]" id="{{ $name }}" multiple >
        @foreach($technologies as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>

    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
