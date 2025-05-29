<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', config('app.name', 'Laravel'))
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFDFC] text-[#1b1b18] flex min-h-screen flex-col">
    @if (auth()->check())
        <header class="w-full bg-[#4439C5] text-sm mb-6 not-has-[nav]:hidden">
            <nav class="flex w-full items-center justify-between px-4 py-2.5 max-w-4xl mx-auto">
                <div class="flex items-center">
                    <span class="text-white font-bold text-lg tracking-wide">AGENDA.AI</span>
                </div>
                <div class="flex items-center">
                    <span class="text-white font-semibold mr-4">Olá, {{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="px-4 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">Sair</button>
                    </form>
                </div>
            </nav>
        </header>
    @endif
    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 starting:opacity-0">
        <main class="flex w-full px-10 flex-col-reverse lg:max-w-4xl lg:flex-row lg:px-0">
            @yield('content')
        </main>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
