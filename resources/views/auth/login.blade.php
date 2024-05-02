<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{--            <x-authentication-card-logo />--}}
            <h1 class="text-4xl text-text dark:text-dm-text">{{ __('auth.login_text') }}</h1>
        </x-slot>

        <x-validation-errors class="mb-4"/>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-input-group id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" :label="__('auth.email')" divclass="mt-2" />

            <x-input-group id="password" type="password" name="password" required autocomplete="current-password" :label="__('auth.password')" divclass="mt-4" />

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember"/>
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('auth.remember_me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-se dark:focus:ring-dm-se dark:focus:ring-offset-gray-800"
                       href="{{ route('password.request') }}" wire:navigate>
                        {{ __('auth.forgot_password') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('auth.login') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
