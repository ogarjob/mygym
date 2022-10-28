<x-form.field>
    <button type="submit" 
        {{ $attributes(['class' => "btn btn-primary mt-2"]) }}
    >
        {{ $slot }}
    </button>
</x-form.field>