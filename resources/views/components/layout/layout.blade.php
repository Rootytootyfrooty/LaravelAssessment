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
        <header>
            <x-layout.nav/>
        </header>
        <main>
            {{ $slot }}
        </main>
    </body>
</html>