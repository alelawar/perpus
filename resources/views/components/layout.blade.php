<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Perpus SMK Infokom</title>
</head>

<body class="bg-background-color font-[Poppins] flex">

    <!-- Aside -->
    <aside class="sidebar top-0 bottom-0 lg:left-0 left-[-300px] p-2 w-[300px] overflow-y-auto text-center bg-tersier-color h-screen shadow-[4px_0_10px_rgba(0,0,0,0.3)]">
        <div class="text-xl">
            <div class="p-2.5 mt-11 mb-11 items-center justify-center flex rounded-md text-left">
                <h1 class="text-[15px] text-xl text-black font-bold">PERPUS<br><span class="text-primer-color">Nasional</span></h1>
            </div>

            <hr class="my-2 text-primer-color">

            <div class="text-black">
                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:text-skunder-color hover:font-bold">
                    <span class="text-[15px] ml-10">Beranda</span>
                </div>
                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:text-skunder-color hover:font-bold">
                    <span class="text-[15px] ml-10">Buku Terbaru</span>
                </div>
                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:text-skunder-color hover:font-bold">
                    <span class="text-[15px] ml-10">Trending</span>
                </div>
                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:text-skunder-color hover:font-bold">
                    <span class="text-[15px] ml-10">Paling Diminati</span>
                </div>
                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:text-skunder-color hover:font-bold">
                    <span class="text-[15px] ml-10">Usulan Buku</span>
                </div>
            </div>
        </div>
    </aside>
    <!-- End Aside -->

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-screen">
        <!-- Header -->
        <header class="h-16 px-10 w-full">
            <div class="flex justify-between items-center mt-2">
                <div class="text-skunder-color mt-2 text-[30px]">
                    <h1>Beranda</h1>
                </div>
                <div class="p-2.5 mt-3 flex items-center rounded-full px-4 duration-300 cursor-pointer bg-tersier-color shadow-md">
                    <i class="bi bi-search text-sm"></i>
                    <input class="text-[15px] ml-4 w-full bg-transparent focus:outline-none text-gray-600 placeholder-gray-500" placeholder="Search . . ." />
                </div>
            </div>
        </header>
        <!-- End Header -->

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-y-auto mt-10 mx-10">
            {{ $slot }}
        </div>
        <!-- End Scrollable Content -->
    </main>
    <!-- End Main Content -->

</body>

</html>