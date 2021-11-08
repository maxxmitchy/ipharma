<div x-data="{ active: {{ $comment->id }} }" class="space-y-4">
    <div x-data="{
        id: {{ $comment->id }},
        get expanded() {
            return this.active === this.id
        },
        set expanded(value) {
            this.active = value ? this.id : null
        },
    }" role="region" class="border mb-2 rounded-md">
        <h2>
            <button
                @click="expanded = !expanded"
                :aria-expanded="expanded"
                class="flex text-xs items-center justify-between w-full font-bold px-4 py-1"
            >
                <p class="text-left text-gray-800 font-bold tracking-wider">{{ $comment->title }}</p>
                <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
            </button>
        </h2>

        <div x-show.transition="expanded" x-collapse>
            <div class="pb-4 px-4 text-xs font-semibold tracking-wider text-gray-500">
                {{ $comment->body}}
            </div>
        </div>
    </div>
</div>
