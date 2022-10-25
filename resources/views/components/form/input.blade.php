@props(['name', 'type'=> 'text'])

<x-form.field>
	<x-form.label name="{{ $name }}" />
	<input class="form-control form-control-user" 
		type="{{ $type }}" 
		id="{{ $name }}" 
		name="{{ $name }}" 
		value="{{ old($name) }}" 
		required
	>
	<x-form.error name="{{ $name }}" />
</x-form.field>