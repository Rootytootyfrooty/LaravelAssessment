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
    </body>
</html>