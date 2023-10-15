<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email or Username -->
        <div>
            {{-- <x-input-label for="input_type" :value="__('Email/Username')" /> --}}
            <x-text-input id="input_type" class="block mt-1 w-full" type="text" name="input_type" :value="old('input_type')"
                autofocus autocomplete="input_type" placeholder="Email or Username" />
            <x-input-error :messages="$errors->get('email') + $errors->get('username')" class="mt-2" />

        </div>

        <!-- Password -->
        <div class="mt-4">
            {{-- <x-input-label for="password" :value="__('Password')" /> --}}

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                autocomplete="current-password" placeholder="Password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-center items-center mt-3">
            <x-primary-button class="w-full">
                <div class="text-center">
                    {{ __('Log in') }}
                </div>
            </x-primary-button>
        </div>
        



        <div class="flex items-center justify-center mt-1">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif


        </div>

        @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
        @else
            @if (Route::has('register'))
                <div class="flex items-center justify-center mt-3 ">
                    <a href="{{ route('register') }}" class="btn btn-secondary bg-green-800 hover:bg-green-700">Register</a>
                </div>
            @endif
        @endauth


        <!-- Remember Me -->
        {{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div> --}}


    </form>




</x-guest-layout>
