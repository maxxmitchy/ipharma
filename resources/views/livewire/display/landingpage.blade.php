<div>
    <x-Navigation.Guest.Header.header-one/>
    <x-Display.Guest.LandingPage.hero-carousel :banners="$banners" />
    <div class="px-3 flex flex-col space-y-4 mt-5">
        <x-Icons.sanitizer-can class="h-8 w-8"/>
        <p class="text-sm tracking-wider font-semibold">Learn more about our <b class="font-bold text-primary underline">Covid 19 Health & Safety Measures</b></p>
    </div>
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
    <x-Navigation.Guest.bottom-fixed-footer/>
</div>
