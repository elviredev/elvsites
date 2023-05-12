@php
    // type de champ par défaut = text
    $type ??= 'text';
    // si pas de class, par défaut null
    $class ??= null;
    // si pas de name, par défaut string vide
    $name ??= '';
    $value ??= '';
    // label par défaut = le name avec 1ère lettre en majuscule
    $label ??= ucfirst($name);
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>

    @if($type === 'textarea')
        <textarea class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}">{{ old($name, $value) }}</textarea>
    @else
        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @endif

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
