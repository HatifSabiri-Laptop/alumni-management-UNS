<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Logo (centered) -->
        <div class="flex justify-center mb-3">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo-small" style="max-height: 280px;">
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-3">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Login Button -->
        <div class="mt-4">
            <button
                type="submit"
                class="w-full px-8 py-3 rounded-xl bg-gradient-to-r from-sky-400 via-blue-500 to-cyan-500
                       text-black font-bold shadow-xl hover:shadow-2xl 
                       hover:scale-105 hover:from-sky-500 hover:via-blue-600 hover:to-cyan-600
                       transition-all duration-300 transform active:scale-95">
                🚀 {{ __('Log in') }}
            </button>
        </div>

        <!-- Forgot Password Link -->
        <div class="text-center mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-indigo-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
        </div>
    </form>
</x-guest-layout>