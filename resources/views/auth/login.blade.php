<x-html>

    <div class="flex items-center justify-center min-h-screen mx-auto">
        <div class="flex w-[1000px] h-[480px] shadow-lg rounded-2xl overflow-hidden bg-[url('https://img.freepik.com/free-photo/vivid-blurred-colorful-wallpaper-background_58702-3893.jpg?t=st=1739927988~exp=1739931588~hmac=e50107499c04e8dc3326e2278fea890054ab0fe068fb5a38e17c6d2ef2c7b260&w=1380')] bg-cover bg-center justify-center items-center">

            <!-- Bagian Kiri -->
            <div class="text-center text-white w-1/2 px-20 h-full flex flex-col justify-center">
                <h1 class="text-2xl font-bold font-mono">Perpus<br>SMK Infokom</h1>
                <p class="text-sm mt-4 bottom-4">
                    Perpustakaan ini hanya bisa diakses oleh Siswa dan Siswi SMK Infokom.
                    Login untuk meminjam buku.
                </p>
            </div>

            <!-- Bagian Form -->
            <div class="w-1/2 h-full px-8 flex justify-center flex-col bg-white rounded-xl">
                <h2 class="text-3xl font-bold text-center text-skunder-color">
                    Selamat Datang
                </h2>
                <p class="text-sm text-center">
                    Silahkan masukkan akun untuk<br>melanjutkan.
                </p>

                <form class="space-y-4 mt-5">
                    <div class="relative bg-tersier-color rounded-lg">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 bg-transparent">
                            <i class="bi bi-person text-skunder-color"></i>
                        </span>
                        <input class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skunder-color bg-transparent" placeholder="Email" type="text" />
                    </div>
                    <div class="relative bg-tersier-color rounded-lg">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 bg-transparent">
                            <i class="bi bi-lock text-skunder-color"></i>
                        </span>
                        <input class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skunder-color bg-transparent" placeholder="Password" type="password" />
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input class="form-checkbox text-skunder-color" type="checkbox" />
                            <span class="ml-2 text-gray-700">Ingat saya</span>
                        </label>
                        <a class="text-skunder-color hover:underline text-sm" href="#">
                            Lupa password?
                        </a>
                    </div>

                    <button class="w-1/3 py-2 block mx-auto bg-skunder-color text-white text-xs font-bold rounded-lg hover:bg-transparent hover:text-skunder-color hover:border-blue-300 border-2 focus:ring focus:ring-blue-300 transition duration-500" type="submit">
                        Masuk
                    </button>
                </form>

                <p class="text-center text-sm mt-5">
                    Belum memiliki akun? <a class="text-blue-600 hover:underline" href="#">Buat akun</a>
                </p>
            </div>
        </div>
    </div>



</x-html>