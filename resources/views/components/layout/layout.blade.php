@props(['title', 'favicon' => 'default/crm'])
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/icons/' . $favicon . '.png') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-screen flex flex-col">
        {{-- Empty script tag because FOUC still an issue on FireFox --}}
        <script>0</script>
        <header class="sticky top-0 z-50">
            <x-layout.nav :title="$title" />
        </header>
        <main>
            <h1 class="text-4xl text-center mt-8 mb-3">{{ $title }}</h1>
            {{ $slot }}
        </main>
        @session('success')
            <div id="success-msg" 
                class="bg-green-700 min-w-[250px] text-center p-4 rounded-md text-xl absolute left-1/2 lg:left-6/8 top-1/8 -translate-y-1/8
                opacity-0 transition-all duration-300 ease-in">
                {{ $value }}
            </div>
        @endsession
        @if (session('error'))
            <div id="error-msg"
                class="border border-red-500 text-red-500 bg-base-300 min-w-[250px] text-center p-4 rounded-md text-xl absolute left-1/2 lg:left-6/8 top-1/8 -translate-y-1/8
                opacity-0 transition-all duration-300 ease-in">
                {{ session('error') }}
            </div>
        @endif
        <x-layout.footer />
    </body>
</html>