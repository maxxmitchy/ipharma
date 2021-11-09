<div>
    <x-Navigation.Guest.Header.header-one/>
    <x-Display.Guest.LandingPage.hero-carousel :banners="$banners" />
    <!-- <div class="px-3 flex flex-col space-y-4 mt-5">
        <x-Icons.sanitizer-can class="h-8 w-8"/>
        <p class="text-sm tracking-wider font-semibold">Learn more about our <b class="font-bold text-primary underline">Covid 19 Health & Safety Measures</b></p>
    </div> -->
    <br>
    <div class="md:flex px-3 md:flex-col md:justify-center space-y-4">
        <h2 class="text-black tracking-wider text-xl md:text-4xl font-bold">
            <b class="font-bold text-primary">Biggest</b> Online Pharmacy in <b class="font-bold text-primary">Lagos, Nigeria</b>. NationWide Delivery for a better health and lifestyle.
        </h2>
        <p class="text-sm tracking-wider text-gray-700">Direct free delivery to destination. Free returns and payback, terms and conditions apply.</p>
        <div class="flex space-x-4">
            <a href="{{ route('shop') }}" class="tracking-wider rounded-md text-sm border border-primary text-primary px-4 py-2">
                Shop Now
            </a>
            <a href="" class="tracking-wider rounded-md text-sm bg-primary text-white px-4 py-2">
                <x-Icons.play class="h-5 w-5"/>
            </a>
        </div>
    </div>
    <br>
    <x-Display.Guest.LandingPage.banner :banner="[]"/>
    <x-Display.Guest.LandingPage.featured-brands :brands="$brands"/>
    <x-Display.Guest.LandingPage.featured-categories :title="'Featured Categories'" :featuredCategories="$featuredcategories"/>
    <!-- repeatable sections; top-selling, new, best sellers, customers favourites et.c -->
        <x-Display.Guest.LandingPage.repeatable-sections :name="'Top Selling'" :products="$topselling"/>
        <x-Display.Guest.LandingPage.repeatable-sections :name="'Best Sellers'" :products="[]"/>
        <x-Display.Guest.LandingPage.repeatable-sections :name="'New Products'" :products="$newproducts"/>
        <x-Display.Guest.LandingPage.repeatable-sections :name="'Customers Favourites'" :products="[]"/>
    <!-- end repeatable sections; top-selling, new, best sellers, customers favourites et.c -->
    <!--  -->
    <div class="px-3">
        <x-Display.Guest.LandingPage.products-you-may-like/>
    </div>
    <!--  -->
    <!-- news letter -->
    <footer class="mx-3 bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="" class="mx-auto -mb-6" alt="">
        <h5 class="text-lg md:text-3xl">Subscribe to our email list to stay in touch with our latest products</h5>
        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                <form action="" class="lg:flex text-sm">
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
