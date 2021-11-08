<div class="z-50 fixed grid place-items-center inset-0 mx-3" x-data="{show : @entangle($attributes->wire('model'))}" x-show="show" @keydown.escape.window="show = false" style="display: none;">
    <div @click="show=false" class="z-50 inset-0 bg-gray-800 opacity-60 fixed"></div>
    <div x-show.transition="show" class="rounded bg-white p-3 text-center sm:mt-0 shadow-md max-w-xs z-50 sm:text-left">
        <div class="">
            {{$title}}
        </div>
        <div class="mt-2 text-left">
            {{$body}}
        </div>
    </div>
</div>
