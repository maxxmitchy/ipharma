@props(['bottom' => 0])

<div class="z-50 overflow-y-scroll fixed grid place-items-center inset-0" x-data="{show : @entangle($attributes->wire('model'))}" x-show="show" @keydown.escape.window="show = false" style="display: none;" {{$attributes}}>
    <div class=" inset-0 bottom-{{$bottom}} bg-gray-800 opacity-60 fixed"></div>
    <div x-show.transition="show" class="overflow-y-scroll  bg-white pb-3 fixed bottom-{{$bottom}} top-0 right-0 left-0 sm:mt-0 z-50 sm:text-left">
        <div class="bg-white">
            {{$title}}
        </div>
        <div class="mt-2 px-3">
            {{$body}}
        </div>
    </div>
</div>
