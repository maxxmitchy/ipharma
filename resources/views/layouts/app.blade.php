<x-base>
    <div class="min-h-screen">
        <nav x-data="{ open: false }" class="bg-white sm:hidden border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-12">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('index') }}">
                                iPharma
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                <!-- navigation links on big screen -->
                            </x-nav-link>
                        </div>
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">

                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <x-Icons.hamburger class="h-5 w-5"/>
                        </button>
                    </div>
                </div>
            </div>
            <x-Navigation.Auth.sidenav />
        </nav>
        <!-- Page Content -->
        <main class="bg-white">
            <x-notify/>
            {{ $slot }}
        </main>
    </div>
</x-base>
