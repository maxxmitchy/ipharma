@props(['formAction' => false])

<div class="w-full">
    @if ($formAction)
        <form action="" wire:submit.prevent="{{ $formAction }}">
            @csrf
    @endif
            <div class="flex justify-between w-full bg-white p-4 sm:px-6 sm:py-4 border-b border-gray-150">
                @if (isset($title))
                    <h3 class="text-base sm:text-lg leading-6 font-medium text-gray-900">
                        {{ $title }}
                    </h3>
                    {{$slot}}
                @endif
            </div>
            <div class="bg-white px-4 sm:p-6">
                <div class="space-y-6">
                    {{ $content}}
                </div>
            </div>

            <div class="bg-white px-4 sm:px-4 sm:flex">
                {{ $buttons }}
            </div>
    @if ($formAction)
        </form>
    @endif
</div>
