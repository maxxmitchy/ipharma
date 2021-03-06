<div class="swiper mySwiper" wire:ignore>
    <div class="swiper-wrapper">
        @foreach ( $banners as $banner )
            <div class="mt-3 swiper-slide">
                <img data-src="{{asset(Illuminate\Support\Str::after($banner?->getFirstMedia()?->getUrl(), 'http://localhost/'))}}" class="swiper-lazy h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full z-30"/>
                <div class="swiper-lazy-preloader"></div>
            </div>
        @endforeach
    </div>
    <!-- <div class="swiper-pagination"></div> -->
</div>
