@props(['name'])

<div class="fixed grid place-items-center inset-0" x-show="show" id="{{$name}}" x-on:modal.window="show=($event.detail === name)" @keydown.escape.window="show = false" x-data="{show:false, name: '{{$name}}'}" {{$attributes}}>
    <div @click="show=false" class="z-30 inset-0 bg-gray-800 opacity-60 fixed"></div>
    <div x-show.transition="show" class="rounded bg-white p-3 mt-3 text-center sm:mt-0 shadow-md mx-3 max-w-xs z-50 sm:text-left">

        <div class="">
            {{$title}}
        </div>
        <div class="mt-2 text-left">
            {{$body}}
        </div>
        <div class="flex space-x-4 mt-2">
            {{$footer}}
        </div>
    </div>
</div>
