<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-slate-100 h-[100dvh] py-0 xl:py-5">
    <header class="px-6 py-4 bg font-medium mx-auto max-w-[600px] bg-slate-800 text-white text-xl">
        <h1>
            @yield('title')
        </h1>
    </header>
    <main class="p-6 xl:p-0 xl:pt-6 mb-5 mx-auto max-w-[600px]">
        @if (session()->has('success'))
            <div x-data="{ flash: true }" x-show="flash"
                class="p-3  border-1 border-green-600 text-green-600 w-full mb-5 block font-medium flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <button @click="flash = false" class="cursor-pointer">X</button>
            </div>
        @endif
        @yield('content')
    </main>
    <footer class="mx-auto max-w-[600px] text-center text-slate-400 text-sm mt-3 pb-7">
        Created by Gustavo Coimbra using Laravel
    </footer>
</body>

</html>