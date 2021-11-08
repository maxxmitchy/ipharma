@props(['initialValue' => ''])
<div class="rounded-md mt-2"
    wire:ignore
    {{ $attributes }}
    x-data
    @trix-blur="$dispatch('change', $event.target.value)"
    >
    <input id="x" type="hidden" value="{{ $initialValue }}">
    <trix-editor input="x" class="form-textarea w-full block transition duration-150 ease-in-out sm:text-sm sm:leading-5">

    </trix-editor>
</div>
