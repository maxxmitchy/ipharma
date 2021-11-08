@props(['dropdown' => false, 'url' => '#'])
<li x-data="{options : false}" class="text-sm px-5 sm:px-0 tracking-wider block py-2">
    <div class="flex justify-between items-center">
        <a href="{{$url}}" class="text-xs tracking-wider">{{$title}}</a>
        @if ($dropdown)
            <template x-if="options == false">
                <svg @click="options = !options" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 tansition" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </template>
            <template x-if="options == true">
                <svg @click="options = !options" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 tansition" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </template>
        @endif
        {{$slot}}
    </div>
    @if ($dropdown)
        <div x-show="options" class="transition w-full bg-appwhite p-2 rounded">
            {{$children}}
        </div>
    @endif
</li>
