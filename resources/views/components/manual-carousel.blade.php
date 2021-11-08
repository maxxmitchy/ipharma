<div
    x-data="{
        skip: 1,
        next() {
            this.to((current, offset) => current + (offset * this.skip))
        },
        prev() {
            this.to((current, offset) => current - (offset * this.skip))
        },
        to(strategy) {
            let slider = this.$refs.slider
            let current = slider.scrollLeft
            let offset = slider.firstElementChild.getBoundingClientRect().width
            slider.scrollTo({ left: strategy(current, offset), behavior: 'smooth' })
        },

    }"
    class="flex flex-col w-full"
>
    <div
        @keydown.right="next"
        @keydown.left="prev"
        tabindex="0"
        role="region"
        aria-labelledby="carousel-label"
        class="flex space-x-2"
    >
        <h2 id="carousel-label" class="sr-only" hidden>Carousel</h2>

        <button @click="prev" class="text-primary text-2xl">
            <span aria-hidden="true">❮</span>
            <span class="sr-only">Skip to previous slide</span>
        </button>

        <!-- <span id="carousel-content-label" class="sr-only" hidden>Carousel</span> -->

        <ul
            x-ref="slider"
            tabindex="0"
            role="listbox"
            aria-labelledby="carousel-content-label"
            class="flex w-full overflow-x-scroll"
            style="scroll-snap-type: x mandatory;"
        >
            @foreach ($categories as $category )
                <li style="scroll-snap-align: start;" class="mb-5 w-2/3 flex-shrink-0 flex flex-col items-center justify-center p-2" role="option">
                    <a href="{{route('category.category', ['name' => Illuminate\Support\Str::slug($category->name)])}}"
                        class="rounded-md rounded-b-none bg-gray-50 w-full"
                    >
                        <img alt="img" src="{{asset(Illuminate\Support\Str::after($category->getFirstMedia()?->getUrl(), 'http://localhost/'))}}" class="object-cover bg-gray-50 44">
                    </a>
                    <div class="rounded-md w-full rounded-t-none bg-primary tracking-wider px-3 py-1">
                        <p class="text-xs font-bold capitalize text-white whitespace-nowrap truncate">{{$category->name}}</p>
                    </div>
                </li>
            @endforeach
        </ul>

        <button @click="next" class="text-primary text-2xl">
            <span aria-hidden="true">❯</span>
            <span class="sr-only">Skip to next slide</span>
        </button>
    </div>
</div>
