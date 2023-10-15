<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div id="formContainer">
        <form method="POST" action="{{ route('password.email') }}" id="passwordResetForm">
            @csrf

            <!-- Email Address -->
            <div style="position: relative;">
                <x-input-label for="email" :value="__('Email')" />
                <div class="email-input-container" style="position: relative;">
                    <x-text-input id="email" class="block mt-1 w-full pr-10" type="email" name="email" :value="old('email')" autofocus />
                    <div id="loadingSpinner" class="custom-spinner" style="position: absolute; top: 55%; right: 0; transform: translateY(-50%); width: 2em; display: none;">
                        @include('custom-spinner')
                    </div>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button type="submit">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('passwordResetForm');
            const spinner = document.getElementById('loadingSpinner');

            form.addEventListener('submit', function(event) {
                spinner.style.display = 'block';
            });
        });
    </script>
</x-guest-layout>
