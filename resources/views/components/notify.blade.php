<div
    x-data="{
        show: false,
        messages: [],
        remove(message) {
            this.messages.splice(this.messages.indexOf(message), 1)
        }
    }"
    @notify.window="show = true; let message = $event.detail; messages.push(message); setTimeout(() => { remove(message), show = false }, 2500)"
    class="z-50 fixed inset-0 flex flex-col items-end justify-center px-4 py-6 sm:p-6 sm:justify-start space-y-4"
    x-show = show
    style="display: none;"
>
    <div @click="show=false" class="z-30 inset-0 bg-gray-800 opacity-60 fixed"></div>
    <template x-for="(message, messageIndex) in messages" :key="messageIndex">
        <div
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="ease-in duration-100 transition"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-event-visible"
            >
            <div class="rounded-lg shadow-xs overflow-hidden">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0 5">
                            <p x-text="message" class="text-sm leading-5 font-medium text-gray-900"></p>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                                <x-Icons.minus @click="messages.splice(messageIndex, 1)" class="h-5 w-5"/>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
