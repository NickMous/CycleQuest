<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <h1 class="text-4xl text-text dark:text-dm-text">{{ __('auth.register_text') }}</h1>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-input-group divclass="mt-2" :label="__('auth.name')" name="name" type="text" required autofocus autocomplete="name" />

            <x-input-group divclass="mt-4" :label="__('auth.email')" name="email" type="email" required autocomplete="username" />

            <x-input-group divclass="mt-4" :label="__('auth.password')" name="password" type="password" required autocomplete="new-password" />

            <x-input-group divclass="mt-4" :label="__('auth.confirm_password')" name="password_confirmation" type="password" required autocomplete="new-password" />

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-se dark:focus:ring-dm-se dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('auth.already_registered') }}
                </a>

                <x-button class="ms-4">
                    {{ __('auth.register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
