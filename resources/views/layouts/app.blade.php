<!doctype html>
<html x-data="{ darkMode: localStorage.getItem('dark') === 'true'}"
			x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
			x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>

<body>
    <div class="flex gap-8 bg-white dark:bg-gray-900 h-screen">
        <x-sidebar class="min-w-fit flex-grow-0 flex-shrink-0 hidden md:block"/>
        <main class="mt-24 px-8 sm:ml-64 flex-grow">
            {{ $slot }}
            <x-footer />
        </main>
    </div>
    @stack('footer')
</body>
</html>