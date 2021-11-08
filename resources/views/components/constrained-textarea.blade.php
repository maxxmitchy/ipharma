@props(['limit' => 255, 'value' => ''])

<div
    x-data="{
        content: '{{ $value }}',
        limit: {{ $limit }},
        get remaining() {
            return this.limit - this.content.length
        }
    }"
>
    <textarea
        x-model="content"
        maxlength="{{ $limit }}"
        {{ $attributes->merge(['class' => 'w-full resize border tracking-wider rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm text-gray-500']) }}
    ></textarea>

    <p>
        <small>You have <span x-text="remaining"></span> characters remaining.</small>
    </p>
</div>
