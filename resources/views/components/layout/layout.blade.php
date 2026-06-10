@props(['title'])
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header class="sticky top-0 z-50">
            <x-layout.nav :title="$title" />
        </header>
        <main>
            <h1 class="text-ghost text-4xl text-white text-center mt-8 mb-3">{{ $title }}</h1>
            {{ $slot }}
        </main>
        @session('success')
            <div id="success-msg" class="bg-green-700 min-w-[250px] text-center p-4 rounded-md text-success-content/150 text-xl absolute left-1/2 lg:left-7/8 top-1/8 transform -translate-x-1/2 -translate-y-1/2">
                {{ $value }}
            </div>
        @endsession
    </body>
</html>