<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <h1 class="text-4xl text-text dark:text-dm-text">{{ __('auth.uhoh') }}</h1>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('auth.forgot_password_text') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <x-input-group id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" :label="__('auth.email')" />

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('auth.email_password_reset_link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
