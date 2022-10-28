@props(['name', 'type'=> 'text', 'placeholder' => '', 'label' => '' ])
<x-form.field>
	<x-form.label name="{{ $name }}" label="{{ $label }}"/>
	<input  
		type="{{ $type }}" 
		id="{{ $name }}"
		placeholder="{{ $placeholder }}" 
		name="{{ $name }}" 
		required
		{{ $attributes(['value' => old($name), "class" => "form-control form-control-user" ]) }}  
	>
	<x-form.error name="{{ $name }}" />
</x-form.field>