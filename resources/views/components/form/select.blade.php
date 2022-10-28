@props(['name', 'label' => ''])
<x-form.field>
    <x-form.label name="{{ $name }}" label="{{ $label }}" />
    <select class="form-control" name="{{ $name }}" id="{{ $name }}">
        {{ $slot }}
    </select>
</x-form.field>