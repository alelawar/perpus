<x-html>

    <div x-data="{ open: false }" class="relative">

        <button @click="open = !open" class="text-primary text-3xl fixed top-4 left-4 z-40 p-2 rounded-md md:hidden">
            ☰
        </button>

        <div x-show="open" @click="open = false" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"></div>

        <aside
            class="fixed top-0 left-0 w-[240px] h-screen bg-tertiary shadow-lg flex flex-col p-4 transform transition-transform duration-300 ease-in-out z-50"
            :class="open ? 'translate-x-0' : '-translate-x-full'">

            <button @click="open = false" class="absolute top-4 right-4 text-2xl text-primary md:hidden">✖</button>

            <div class="text-left mt-12">
                <h1 class="text-xl font-bold text-black">PERPUS<br><span class="text-primary">SMK Infokom</span>
                </h1>
            </div>

            <div class="flex flex-col h-screen">
                <nav class=" space-y-4">
                    <a href="/" class="flex items-center p-2 text-[15px] hover:text-secondary {{ request()->is('/') ? 'text-secondary font-semibold' : '' }}">
                        <i class="bi bi-house-door text-primary"></i>
                        <span class="ml-2">Beranda</span>
                    </a>
                    <a href="/terbaru" class="flex items-center p-2 text-[15px] hover:text-secondary {{ request()->is('terbaru') ? 'text-secondary font-semibold' : '' }}">
                        <i class="bi bi-arrow-bar-down text-primary"></i>
                        <span class="ml-2">Buku Terbaru</span>
                    </a>
                    <a href="/trending" class="flex items-center p-2 text-[15px] hover:text-secondary  {{ request()->is('trending') ? 'text-secondary font-semibold' : '' }}">
                        <i class="bi bi-fire text-primary"></i>
                        <span class="ml-2">Trending</span>
                    </a>
                    <a href="/user/wishlist" class="flex items-center p-2 text-[15px] hover:text-secondary  {{ request()->is('user/wishlist') ? 'text-secondary font-semibold' : '' }}">
                        <i class="bi bi-bookmark-heart text-primary"></i>
                        <span class="ml-2">Wishlist</span>
                    </a>
                    <a href="/usulan" class="flex items-center p-2 text-[15px] hover:text-secondary {{ request()->is('usulan') ? 'text-secondary font-semibold' : '' }}">
                        <i class="bi bi-chat-square-text text-primary"></i>
                        <span class="ml-2">Usulan Buku</span>
                    </a>
                </nav>
                @guest
                <a href="/auth/login"
                    class="bottom-4 bg-secondary text-white font-bold py-2 w-1/2 rounded-full shadow-xl cursor-pointer mb-10 mx-auto hover:bg-transparent hover:text-secondary hover:ring-2 transition duration-500 text-center">
                    Login
                </a>
            </div>
            @endguest
            @auth
            <a href="/user"
                class="bottom-4 bg-secondary text-white font-bold py-2 mt-96 w-1/2 rounded-full shadow-xl cursor-pointer mb-10 mx-auto hover:bg-transparent hover:text-secondary hover:ring-2 transition duration-500 text-center">
                Profile
            </a>
            @endauth
    </div>

    </aside>

    <!-- Aside Desktop-->
    <aside class="hidden md:block">
        <div
            class="sidebar top-0 bottom-0 lg:left-0 left-[-300px] p-2 w-[240px] overflow-y-auto text-center bg-tertiary h-screen shadow-[4px_0_10px_rgba(0,0,0,0.3)] flex flex-col justify-between ">
            <div class="text-xl">
                <div class="p-2.5 mb-11 items-center justify-center flex rounded-md text-left space-x-2">
                    <img src="{{ asset('img/favicon.png') }}" alt="logos" class="h-14 w-14">
                    <h1 class=" text-lg text-black font-bold">PERPUS<br><span class="text-primary">SMK Infokom</span></h1>
                </div>

                <div class="text-black -mt-10">
                    <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:text-secondary {{ request()->is('/') ? 'text-secondary font-semibold' : '' }}">
                        <span><i class="bi bi-house-door text-primary"></i></span>
                        <a href="/" class="text-base ml-2">Beranda</a>
                    </div>
                    <div
                        class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:text-secondary {{ request()->is('terbaru') ? 'text-secondary font-semibold' : '' }}">
                        <span>
                            <i class="bi bi-arrow-bar-down text-primary"></i></span>
                        <a href="/terbaru" class="text-base ml-2">Buku Terbaru</a>
                    </div>
                    <div
                        class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:text-secondary {{ request()->is('trending') ? 'text-secondary font-semibold' : '' }}">
                        <span>
                            <i class="bi bi-fire text-primary"></i></span>
                        <a href="/trending" class="text-base ml-2">Trending</a>
                    </div>
                    <div
                        class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:text-secondary {{ request()->is('user/wishlist') ? 'text-secondary font-semibold' : '' }}">
                        <span>
                            <i class="bi bi-bookmark-heart text-primary"></i></span>
                        <a href="/user/wishlist" class="text-base ml-2">Wishlist</a>
                    </div>
                    <div
                        class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:text-secondary {{ request()->is('usulan') ? 'text-secondary font-semibold' : '' }}">
                        <span>
                            <i class="bi bi-chat-square-text text-primary"></i></span>
                        <a href="/usulan" class="text-base ml-2">Usulan Buku</a>
                    </div>
                </div>
            </div>
            @guest
            <a href="/auth/login"
                class="bottom-4 bg-secondary text-white font-bold py-2 w-1/2 rounded-full shadow-xl cursor-pointer mb-10 mx-auto hover:bg-transparent hover:text-secondary hover:ring-2 transition-all duration-700 text-center border-b-4 border-blue-900 active:border-none">
                Login
            </a>
        </div>
        @endguest
        @auth
        <a href="/user"
            class="bottom-4 bg-secondary text-white font-bold py-2 w-20 rounded-full shadow-xl cursor-pointer mb-10 mx-auto hover:ring-2 transition-all duration-700 text-center border-b-4 border-blue-900 active:border-none">
            Profile
        </a>
        @endauth
        </div>
    </aside>
    </div>
    <!-- End Aside -->



    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-screen">
        <!-- Header -->
        <header class="md:h-12 h-20 px-10 w-full">
            <div class="flex flex-col-reverse md:flex-row justify-between items-center mt-2">
                <div class="text-secondary mt-2 text-[30px] font-semibold">
                    <h1>
                        @php
                        $routeName = Route::currentRouteName();
                        $pageTitle = ucfirst(str_replace('-', ' ', $routeName));
                        @endphp
                        {{ $pageTitle }}
                    </h1>
                </div>
                <form action="/search" method="GET">
                    <div
                        class="p-2.5 mt-3 flex items-center rounded-full px-4 duration-300 cursor-pointer bg-tertiary shadow-md">
                        <button type="submit"><i class="bi bi-search text-sm"></i></button>
                        <input
                            class="text-[15px] ml-4 w-full bg-transparent focus:outline-none text-gray-600 placeholder-gray-500"
                            placeholder="Cari judul buku. . ." id="search" name="s" autocomplete="off">
                    </div>
                </form>
            </div>
        </header>
        <!-- End Header -->

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-y-auto mt-10 mx-10 rounded-2xl">
            {{ $slot }}
        </div>
        <!-- End Scrollable Content -->
    </main>
    <!-- End Main Content -->
</x-html>