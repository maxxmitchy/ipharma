<div class="md:px-20">
    <x-Navigation.Guest.Header.header-one/>
    <hr class="bg-gray-600">
    <!--<div class="px-3 flex flex-col space-y-4 mt-5">-->
    <!--    <x-Icons.sanitizer-can class="h-8 w-8"/>-->
    <!--    <p class="text-sm tracking-wider font-semibold">Learn more about our <b class="font-bold text-primary underline">Covid 19 Health & Safety Measures</b></p>-->
    <!--</div>-->
    <br class="hidden md:block">
    <div class="md:grid md:grid-cols-2 md:gap-12 space-y-4 md:space-y-0 mt-4">
        <div class="sm:text-center px-3 tracking-wider">
            <h1 class="space-y-2 md:space-y-8 mr-2 text-3xl md:text-5xl tracking-tight font-black text-gray-900">
                <span class="block capitalize">Online drug store</span>
                <span class="block text-primary capitalize"> made for you.</span>
            </h1>
            <p class="font-lighter mt-3 text-gray-600 sm:mt-5 sm:text-xl sm:max-w-2xl sm:mx-auto md:mt-5">
                With <b class="text-primary">iPharma, </b> you have access to a vast catalog of medictions and supplements in stock.
                Just a quick search on this platform and you get results within seconds to minutes of query.
                Products are delivered to your home or office. Consultations and medical help free for one month after signing up.
            </p>
            <div class="tracking-wider leading-8 mt-5 sm:mt-8 sm:flex shadow-lg border border-secondary rounded-md justify-center p-2 space-x-2 sm:max-w-md sm:mx-auto">
                <h4 class="text-white text-sm md:text-base font-black px-3 py-1 bg-secondary">00 : 00 : 00 : 00 left</h4>
                <h4 class="self-center text-gray-600 font-semibold text-sm md:text-base mt-2 md:mt-0">Black Friday Sales</h4>
                <p class="text-xs sm:text-base tracking-wider font-semibold text-gray-500">Shop from your favourite brands at a discounted price. Click the link below to access black friday steals you don't want to miss.</p>
                <div class="h-0.5 hidden sm:inline self-center w-8 bg-gray-500"></div>
                <a href="/black-friday-sales" class="self-center text-xs md:text-base text-primary font-black underline">shop now</a>
            </div>
        </div>
        <x-Display.Guest.LandingPage.hero-carousel :banners="$banners" />
    </div>
    <br>
    <br>
    <div class="md:flex md:mt-8 px-3 md:flex-col md:justify-center items-center space-y-4">
        <h2 class=" sm:text-center text-black tracking-wider text-xl md:text-4xl font-bold">
            <b class="font-bold text-primary">Biggest</b> Online Pharmacy in <b class="font-bold text-primary">Lagos, Nigeria</b>. NationWide Delivery for a better health and lifestyle.
        </h2>
        <p class="text-sm sm:text-xl tracking-wider text-gray-700">Direct free delivery to destination. Free returns and payback, terms and conditions apply.</p>
        <div class="flex space-x-4">
            <a href="{{ route('shop') }}" class="tracking-wider font-bold text-center rounded-md text-sm md:text-xl border border-primary text-primary px-5 md:px-8 md:pt-2 md:pb-0 py-2">
                Shop Now
            </a>
            <a href="" class="tracking-wider rounded-md text-sm bg-primary text-white px-5 md:px-8 py-2">
                <x-Icons.play class="md:h-8 md:w-8 h-5 w-5"/>
            </a>
        </div>
    </div>
    <br>
    <br class="hidden md:block">
    <x-Display.Guest.LandingPage.banner :banner="[]"/>
    <x-Display.Guest.LandingPage.featured-brands :brands="$brands"/>
    <x-Display.Guest.LandingPage.featured-categories :title="'Featured Categories'" :featuredCategories="$featuredcategories"/>
    <!-- repeatable sections; top-selling, new, best sellers, customers favourites et.c -->
        <x-Display.Guest.LandingPage.repeatable-sections :name="'Top Selling'" :products="$topselling"/>
        <x-Display.Guest.LandingPage.repeatable-sections :name="'Best Sellers'" :products="[]"/>
        <x-Display.Guest.LandingPage.repeatable-sections :name="'New Products'" :products="$newproducts"/>
        <x-Display.Guest.LandingPage.repeatable-sections :name="'Customers Favourites'" :products="[]"/>
    <!-- end repeatable sections; top-selling, new, best sellers, customers favourites et.c -->
    <!-- news letter -->
    <footer class="mx-3 bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="" class="mx-auto -mb-6" alt="">
        <h5 class="text-lg md:text-3xl">Subscribe to our email list to stay in touch with our latest products</h5>
        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                <form action="/newsletter" class="lg:flex text-sm">
                    @csrf
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="" class="hidden lg:inline-block">
                            <x-Icons.mail class="w-6 h-6" />
                        </label>

                        <input placeholder="enter email address" type="email" id="email" class="border-none rounded-full lg:bg-transparent py-2 lg:py-0 pl-4 outline-none focus:ring-0 focus:outline-none">
                    </div>

                    <button class="py-2 px-5 text-sm text-white font-bold transition-colors duration-300 bg-primary hover:bg-blue-700 mt-4 lg:mt-0 lg:ml-3 rounded-full" type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </footer>
    <!-- end news letter -->
    <x-Navigation.Guest.bottom-fixed-footer/>
</div>
