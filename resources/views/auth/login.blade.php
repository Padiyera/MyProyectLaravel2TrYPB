<x-guest-layout>
    <style>
        .custom-login-button {
            background-color: #333; /* Un poco más claro que el negro puro */
            color: white;
            transition: background-color 0.3s, opacity 0.3s;
        }

        .custom-login-button:hover {
            background-color: #333; /* Mantener el mismo color */
            opacity: 0.8; /* Añadir transparencia */
        }
    </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ms-3 custom-login-button">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Google Login Button -->
    @guest
    <div class="mt-6">
        <a href="{{ route('auth.google') }}" class="btn btn-primary w-full">
            <svg class="w-5 h-5 inline-block me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <path fill="#4285F4" d="M24 9.5c3.1 0 5.6 1.1 7.5 2.9l5.6-5.6C33.8 3.4 29.2 1.5 24 1.5 14.8 1.5 7 9.3 7 18.5c0 1.5.2 3 .6 4.4l6.9-5.4c-.1-.6-.2-1.3-.2-2 0-5.2 4.3-9.5 9.5-9.5z" />
                <path fill="#34A853" d="M46.5 24c0-1.5-.1-3-.4-4.4H24v8.4h12.7c-.5 2.7-2 5-4.2 6.5l6.6 5.1c3.8-3.5 6-8.7 6-15.6z" />
                <path fill="#FBBC05" d="M7 28.5c1.3 3.9 4.8 7 9 7.9v-6.4h-5.4c-.7-1.3-1.1-2.7-1.1-4.2 0-1.5.4-2.9 1.1-4.2l-6.9-5.4c-1.3 2.5-2 5.3-2 8.4 0 3.1.7 6 2 8.4z" />
                <path fill="#EA4335" d="M24 46.5c5.2 0 9.6-1.7 12.8-4.6l-6.6-5.1c-1.8 1.2-4.1 1.9-6.2 1.9-4.2 0-7.7-2.8-9-6.6H7v6.4c3.2 5.3 9 8.6 15.5 8.6z" />
            </svg>
            {{ __('Login with Google') }}
        </a>
    </div>
    @endguest
</x-guest-layout>