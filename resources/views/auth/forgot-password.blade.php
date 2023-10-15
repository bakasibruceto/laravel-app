<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->


    <div id="formContainer">
        <form method="POST" action="{{ route('password.email') }}" id="passwordResetForm">
            @csrf

            <!-- Email Address -->
            @if (!empty(session('status')))
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div id="countdown-timer">Redirecting in <span id="countdown">10</span> seconds... <a href="{{ route('login') }}" class="text-blue-800 hover:text-blue-500">click here to redirect</a></div>
            <script>
                // Set the initial countdown time and redirect after 10 seconds
                let countdownTime = 10;
                let countdownElement = document.getElementById('countdown');
                let timerInterval = setInterval(function() {
                    countdownTime--;
                    countdownElement.textContent = countdownTime;
                    if (countdownTime <= 0) {
                        clearInterval(timerInterval); // Stop the countdown
                        window.location.href = "{{ route('login') }}"; // Redirect to the login page
                    }
                }, 1000); // Update the countdown every 1 second (1000 milliseconds)
            </script>
        @else
            <div class="email-input-container" style="position: relative;">
                <x-text-input id="email" class="block mt-1 w-full pr-10" type="email" name="email"
                    :value="old('email')" autofocus />
                <div id="loadingSpinner" class="custom-spinner"
                    style="position: absolute; top: 35%; right: 0; transform: translateY(-50%); width: 2em; display: none;">
                    @include('custom-spinner')
                </div>
                @if ($errors->any())
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                @else
                    <br>
                @endif
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <x-primary-button type="submit">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        @endif
        

        </form>
    </div>

    <script></script>
</x-guest-layout>
