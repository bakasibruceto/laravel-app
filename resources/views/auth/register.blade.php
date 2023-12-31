<x-guest-layout>
    @auth
        <script>
            window.location = "{{ url('/dashboard') }}";
        </script>
    @else
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus
                    autocomplete="name" placeholder="Name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- Username -->
            <div class="mt-4">
                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                    autocomplete="username" placeholder="Username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    autocomplete="email" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                    autocomplete="new-password" placeholder="Password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="mt-3 flex items-center justify-center">
                <x-primary-button class="w-full">
                    {{ __('Register') }}
                </x-primary-button>
            </div>

            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>


            </div>
        </form>

    @endauth
</x-guest-layout>
