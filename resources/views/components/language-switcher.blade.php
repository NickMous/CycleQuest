<div class="ms-3 relative">
    <x-dropdown align="right" width="60">
        <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-text dark:text-dm-text bg-pr/20 dark:bg-dm-pr/20 hover:text-text-700 dark:hover:text-dm-text-300 focus:outline-none focus:bg-pr/60 dark:focus:bg-pr/60 active:bg-pr/50 dark:active:bg-dm-pr/50 transition ease-in-out duration-150">
                                        {{ App::getLocale() }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"/>
                                        </svg>
                                    </button>
                                </span>
        </x-slot>

        <x-slot name="content">
            <div class="w-60">
                <div class="block px-4 py-2 text-xs text-text-600 dark:text-dm-text-300">
                    {{ __('Available languages') }}
                </div>

                <x-dropdown-link :href="route('language', 'en')" :active="App::getLocale() === 'en'">
                    {{ __('English') }}
                </x-dropdown-link>

                <x-dropdown-link :href="route('language', 'nl')" :active="App::getLocale() === 'nl'">
                    {{ __('Dutch') }}
                </x-dropdown-link>
            </div>
        </x-slot>
    </x-dropdown>
</div>
