<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title>Perpus SMK Infokom</title>
</head>

<body class="bg-background font-[Poppins] flex">
    {{ $slot }}
    <div id="loading-screen" class="fixed top-0 left-0 w-full h-full bg-white flex justify-center items-center z-50">
        <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500"></div>
    </div>
    
    <script>
        window.addEventListener("load", function() {
            document.getElementById("loading-screen").style.display = "none";
        });
    </script>

</body>

</html>