<x-layout>
    <div class="flex min-h-[calc(100dvh-4rem)] items-center justify-center px-4">
        <form action="/login" method="POST" class="mt-10 space-y-4">
            @csrf   
            <div class="w-full max-w-md">
                <div class="text-center">
                    <h1 class="text-3xl font-bold tracking-tight text-white">Login</h1>
                </div>
            </div>
            <div class="space-y-2">
                <label for="email" class="label">Email: </label>
                <input type="email" id="email" class="input" name="email">
            </div>
            <div class="space-y-2">
                <label for="password" class="label">Password: </label>
                <input type="password" id="password" class="input" name="password">
            </div>

            <button type="submit" class="btn mt-2 h-10 w-full" data-test="login-button">Login</button>

            
    </div>
</form>
</x-layout>