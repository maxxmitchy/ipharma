<div class="">
    <div @click="open = !open" x-show="open" class="duration-500 z-50 inset-0 bg-gray-800 opacity-40 fixed"></div>
    <nav :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0':open ===false}" class="z-50 inset-0 transform duration-200 fixed w-56 bg-white h-screen shadow">
        <div class="flex justify-between">
            <a  href="/" class="text-lg font-semibold tracking-wider md:text-3xl px-4 pt-4">iPharma</a>
        </div>
        <ul class="relative mt-2 space-y-2">
            @hasrole('admin|subadmin|Super Admin')
                <x-Display.Auth.Admin.Partials.navigation/>
            @else
                <x-Display.Auth.User.Partials.navigation/>
            @endhasrole
            <div class="flex pt-4 justify-between items-center w-full px-5 fixed bottom-5">
                <a href="" class="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                            @csrf
                    <a href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </a>
                </form>
            </div>
        </ul>
    </nav>
</div>
