<x-layout>

    <div class="flex">
        <div x-data="{ open: false }" class="relative w-0">
            <button @click="open = !open" class="text-secondary text-4xl p-2 rounded-md">
                ☰
            </button>

            <div x-show="open" @click="open = false" class="fixed inset-0 z-41"></div>

            <aside
                class="top-0 left-0 w-[240px] h-full bg-tertiary shadow-lg flex flex-col p-4 transform transition-transform duration-300 ease-in-out -mt-14 z-50"
                :class="open ? 'translate-x-0' : '-translate-x-full'">



                <div class="text-left flex justify-between mt-4">
                    <h1 class="text-base font-semibold text-black">Welcome! {{ auth()->user()->fullname }}</h1>
                    <button @click="open = false" class="text-2xl text-primary -mt-1">✖</button>
                </div>

                <div class="flex flex-col h-screen mt-5">
                    <nav class="space-y-4">
                        <a href="/user" class="flex items-center p-2 text-[15px] hover:text-secondary {{ request()->is('user') ? 'text-secondary font-semibold' : '' }}">
                            <i class="bi bi-person text-primary"></i>
                            <span class="ml-2">Profile</span>
                        </a>
                        <a href="/user/pinjaman" class="flex items-center p-2 text-[15px] hover:text-secondary {{ request()->is('user/pinjaman') ? 'text-secondary font-semibold' : '' }}">
                            <i class="bi bi-inbox text-primary"></i>
                            <span class="ml-2">Pinjaman</span>
                        </a>
                        <a href="/user/wishlist" class="flex items-center p-2 text-[15px] hover:text-secondary {{ request()->is('user/wishlist') ? 'text-secondary font-semibold' : '' }}">
                            <i class="bi bi-bookmark-heart text-primary"></i>
                            <span class="ml-2">Wishlist</span>
                        </a>
                    </nav>
                    @auth
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit"
                            class="bottom-4 bg-secondary text-white font-bold py-2 w-1/2 rounded-full shadow-xl cursor-pointer mt-10 mx-14 hover:bg-transparent hover:text-secondary hover:ring-2 transition duration-500 text-center">
                            Logout
                        </button>
                    </form>
                    @endauth
                </div>
            </aside>
        </div>

        <div class="flex-1 overflow-y-auto p-10 pl-16 bg-white">
            {{ $slot }}
        </div>
    </div>

</x-layout>