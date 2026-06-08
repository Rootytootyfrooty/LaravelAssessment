<x-layout title="Welcome">
    <div class="max-w-8/10 mx-auto flex-col items-center justify-center text-center p-5">
        <h1 class="text-4xl pt-10 pb-30">Welcome!</h1>
        @guest
            <div class="my-auto text-white text-2xl">
                <p>Please <a href="/login" class="underline">log in</a> to continue</p>
            </div>
        @endguest
        @auth
        <div class="flex flex-col md:flex-row items-center justify-center gap-x-6 gap-y-6 text-2xl">
            <a href="/companies" class="border rounded-md p-4 hover:underline">
                <p>Click here to view all {{ $companies->count(); }} companies</p>
            </a>
            <a href="/employees" class="border rounded-md p-4 hover:underline">
                <p>Click here to view all  {{ $employees->count(); }}  employees</p>
            </a>
        </div>
        @endauth
    </div>
</x-layout>
