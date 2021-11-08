@props(['checked' => false])

<span class="flex space-x-1 items-center">
    <input {{ $checked ? 'checked' : '' }} {!! $attributes->merge(['class' => 'h-3 w-3 text-primary focus:border-blue-300 focus:ring focus:ring-blue-200 rounded-full']) !!} type="checkbox">
    <p class="text-xs tracking-wider font-semibold">{{$slot}}</p>
</span>
