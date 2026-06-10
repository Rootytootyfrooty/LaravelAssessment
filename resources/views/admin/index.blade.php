<x-layout title="Login">
    <div class="flex min-h-[calc(100dvh-200px)] items-center justify-center px-4">

        <form action="{{ route('login') }}" method="POST" class="space-y-4 mb-30">
            @csrf   
            <div class="space-y-2">
                <label for="email" class="label"><span aria-hidden="true" class="-mr-1">*</span>Email: </label>
                <input type="email" id="email" class="input" name="email" data-test="email">
                @if ($errors->has('email'))
                    <p class="text-error text-center">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div class="space-y-2">
                <label for="password" class="label"><span aria-hidden="true" class="-mr-1">*</span>Password: </label>
                <input type="password" id="password" class="input" name="password" data-test="password">
                @if ($errors->has('password'))
                    <p class="text-error text-center">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <p class="text-base-content/70 italic">Required fields are marked with an asterisk</p>

            <button type="submit" class="btn mt-2 h-10 w-full" data-test="login-button">Login</button>

        </form>
    </div>
</x-layout>