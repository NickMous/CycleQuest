<nav x-data="{ open: false }"
     class="bg-bg dark:bg-dm-bg border-b border-gray-300 dark:border-dm-bg-600 sticky top-0 z-20">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 ms-2 mt-2 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-mark class="block text-text dark:text-dm-text"/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('home.title') }}
                    </x-nav-link>
                    @if(Auth::check())
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            {{ __('navigation.dashboard') }}
                        </x-nav-link>
                    @endif

{{--                        <x-nav-dropdown align="center" outer-div-classes="h-full" trigger-div-classes="h-full">--}}
{{--                            <x-slot name="trigger">--}}
{{--                                <span class="inline-flex h-full">--}}
{{--                                    <button type="button"--}}
{{--                                            class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-text/50 dark:text-dm-text/50 hover:text-text dark:hover:text-dm-text hover:border-ac dark:hover:border-dm-ac focus:outline-none focus:text-text dark:focus:text-dm-text focus:border-pr dark:focus:border-dm-pr transition duration-150 ease-in-out">--}}
{{--                                        {{ __('navigation.route.main') }}--}}

{{--                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"--}}
{{--                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                  d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"/>--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
{{--                                </span>--}}
{{--                            </x-slot>--}}
{{--                            <x-slot name="content">--}}
{{--                                <div class="w-60">--}}
{{--                                    <!-- Team Management -->--}}
{{--                                    <div class="block px-4 py-2 text-xs text-text-600 dark:text-dm-text-300">--}}
{{--                                        {{ __('navigation.route.manage') }}--}}
{{--                                    </div>--}}

{{--                                    <!-- Team Settings -->--}}
{{--                                    @can('create routes')--}}
{{--                                        <x-dropdown-link href="{{ route('route.create') }}">--}}
{{--                                            {{ __('navigation.route.create') }}--}}
{{--                                        </x-dropdown-link>--}}
{{--                                    @endcan--}}
{{--                                </div>--}}
{{--                            </x-slot>--}}
{{--                        </x-nav-dropdown>--}}
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <button
                    class="relative inline-flex items-center overflow-hidden ms-3 px-2 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-text dark:text-dm-text bg-pr/20 dark:bg-dm-pr/20 hover:text-text-700 dark:hover:text-dm-text-300 focus:outline-none focus:bg-pr/60 dark:focus:bg-dm-pr/60 active:bg-pr/50 dark:active:bg-dm-pr/50 transition ease-in-out duration-150"
                    x-data="{ nextDarkMode: () => {
                switch (darkMode) {
                    case 'light':
                        return 'dark';
                    case 'dark':
                        return 'light';
                    case 'system':
                        return 'light';
                }
            }}"
                    x-on:click="darkMode = nextDarkMode()">
                    <div class="w-6 h-6">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             x-show="darkMode === 'light'"
                             x-transition:enter="transition-top ease-out duration-500 delay-500"
                             x-transition:enter-start="top-10"
                             x-transition:enter-end="top-1"
                             x-transition:leave="transition-top ease-in-out duration-500"
                             x-transition:leave-start="top-1"
                             x-transition:leave-end="top-10"
                             class="w-6 h-6 p-1 absolute" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg"
                             x-show="darkMode === 'dark'"
                             x-transition:enter="transition-top ease-out duration-500 delay-500"
                             x-transition:enter-start="top-10"
                             x-transition:enter-end="top-1"
                             x-transition:leave="transition-top ease-in-out duration-500"
                             x-transition:leave-start="top-1"
                             x-transition:leave-end="top-10"
                             class="w-6 h-6 p-1 absolute" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                        </svg>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            x-show="darkMode === 'system'"
                            x-transition:enter="transition-top ease-out duration-500 delay-500"
                            x-transition:enter-start="top-10"
                            x-transition:enter-end="top-1"
                            x-transition:leave="transition-top ease-in-out duration-500"
                            x-transition:leave-start="top-1"
                            x-transition:leave-end="top-10"
                            class="w-6 h-6 p-1 absolute"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                </button>

                <livewire:components.language-switcher/>

                @if(Auth::check())
                    <!-- Teams Dropdown -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="ms-3 relative">
                            <x-dropdown align="right" width="60">
                                <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-text dark:text-dm-text bg-pr/20 dark:bg-dm-pr/20 hover:text-text-700 dark:hover:text-dm-text-300 focus:outline-none focus:bg-pr/60 dark:focus:bg-pr/60 active:bg-pr/50 dark:active:bg-dm-pr/50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"/>
                                        </svg>
                                    </button>
                                </span>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="w-60">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-text-600 dark:text-dm-text-300">
                                            {{ __('navigation.manage_team') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-dropdown-link
                                            href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('navigation.team_settings') }}
                                        </x-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('navigation.create_new_team') }}
                                            </x-dropdown-link>
                                        @endcan

                                        <!-- Team Switcher -->
                                        @if (Auth::user()->allTeams()->count() > 1)
                                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('navigation.switch_teams') }}
                                            </div>

                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-switchable-team :team="$team"/>
                                            @endforeach
                                        @endif
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endif

                    <!-- Settings Dropdown -->
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                             src="{{ Auth::user()->profile_photo_url }}"
                                             alt="{{ Auth::user()->name }}"/>
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-text dark:text-dm-text bg-pr/20 dark:bg-dm-pr/20 hover:text-text-700 dark:hover:text-dm-text-300 focus:outline-none focus:bg-pr/60 dark:focus:bg-pr/60 active:bg-pr/50 dark:active:bg-dm-pr/50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                        </svg>
                                    </button>
                                </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-text-600 dark:text-dm-text-300">
                                    {{ __('navigation.manage_account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('navigation.profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('navigation.api_tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200 dark:border-dm-bg-600"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}"
                                                     @click.prevent="$root.submit();">
                                        {{ __('navigation.logout') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-text dark:text-dm-text bg-pr/20 dark:bg-dm-pr/20 hover:text-text-700 dark:hover:text-dm-text-300 focus:outline-none focus:bg-pr/60 dark:focus:bg-pr/60 active:bg-pr/50 dark:active:bg-dm-pr/50 transition ease-in-out duration-150">
                                        {{ __('navigation.guest') }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <x-dropdown-link href="{{ route('login') }}" wire:navigate>
                                    {{ __('navigation.login') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('register') }}" wire:navigate>
                                    {{ __('navigation.register') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-pr-400 dark:text-dm-pr-400 bg-bg dark:bg-dm-bg hover:text-text-700 dark:hover:text-dm-text-300 focus:outline-none focus:bg-pr/60 dark:focus:bg-dm-pr/60 focus:text-text dark:focus:text-dm-text active:bg-pr/50 dark:active:bg-dm-pr/50 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="block sm:hidden overflow-hidden"
         x-show="open"
         x-transition:enter="transition-[max-height] ease-in-out duration-300"
         x-transition:enter-start="max-h-0"
         x-transition:enter-end="max-h-[400px]"
         x-transition:leave="transition-[max-height] ease-in-out duration-300"
         x-transition:leave-start="max-h-[400px]"
         x-transition:leave-end="max-h-0"
    >
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('home.title') }}
            </x-responsive-nav-link>
            @if(Auth::check())
                <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('navigation.dashboard') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        @if(Auth::check())
            <div class="pt-4 pb-1 border-t border-gray-300/50 dark:border-dm-bg-600/60">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                 alt="{{ Auth::user()->name }}"/>
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-text dark:text-dm-text">{{ Auth::user()->name }}</div>
                        <div
                            class="font-medium text-sm text-text-600 dark:text-dm-text-300/50">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}"
                                           :active="request()->routeIs('profile.show')">
                        {{ __('navigation.profile') }}
                    </x-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}"
                                               :active="request()->routeIs('api-tokens.index')">
                            {{ __('navigation.api_tokens') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}"
                                               @click.prevent="$root.submit();">
                            {{ __('navigation.logout') }}
                        </x-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-300/50 dark:border-dm-bg-600/60"></div>

                        <div class="block px-4 py-2 text-xs text-text-600 dark:text-dm-text-300/50">
                            {{ __('navigation.manage_team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                                               :active="request()->routeIs('teams.show')">
                            {{ __('navigation.team_settings') }}
                        </x-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-responsive-nav-link href="{{ route('teams.create') }}"
                                                   :active="request()->routeIs('teams.create')">
                                {{ __('navigation.create_new_team') }}
                            </x-responsive-nav-link>
                        @endcan

                        <!-- Team Switcher -->
                        @if (Auth::user()->allTeams()->count() > 1)
                            <div class="border-t border-gray-300/50 dark:border-dm-bg-600/60"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('navigation.switch_teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" component="responsive-nav-link"/>
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        @else
            <div class="pt-2 pb-2 border-t border-gray-300/50 dark:border-dm-bg-600/60">

                <div class="space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('navigation.login') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                        {{ __('navigation.register') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        @endif
        <div class="pt-3 pb-3 space-y-1 border-t border-gray-300/50 dark:border-dm-bg-600/60">
            <button
                class="relative overflow-hidden flex w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-text dark:text-dm-text focus:outline-none focus:text-text dark:focus:text-dm-text focus:bg-ac dark:focus:bg-dm-ac focus:border-ac-300 dark:focus:border-dm-ac-300  transition duration-150 ease-in-out"
                x-data="{ nextDarkMode: () => {
                switch (darkMode) {
                    case 'light':
                        return 'dark';
                    case 'dark':
                        return 'system';
                    case 'system':
                        return 'light';
                }
            }}"
                x-on:click="darkMode = nextDarkMode()">
                <div class="h-6 flex">
                    <div class="absolute flex"
                         x-show="darkMode === 'light'"
                         x-transition:enter="transition-top ease-out duration-500 delay-500"
                         x-transition:enter-start="top-10"
                         x-transition:enter-end="top-2"
                         x-transition:leave="transition-top ease-in-out duration-500"
                         x-transition:leave-start="top-2"
                         x-transition:leave-end="top-10">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 p-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <p>Light mode</p>
                    </div>
                    <div class="absolute flex"
                         x-show="darkMode === 'dark'"
                         x-transition:enter="transition-top ease-out duration-500 delay-500"
                         x-transition:enter-start="top-10"
                         x-transition:enter-end="top-2"
                         x-transition:leave="transition-top ease-in-out duration-500"
                         x-transition:leave-start="top-2"
                         x-transition:leave-end="top-10">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 p-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                            <p>Dark mode</p>
                        </svg>
                    </div>
                    <div class="absolute flex"
                         x-show="darkMode === 'system'"
                         x-transition:enter="transition-top ease-out duration-500 delay-500"
                         x-transition:enter-start="top-10"
                         x-transition:enter-end="top-2"
                         x-transition:leave="transition-top ease-in-out duration-500"
                         x-transition:leave-start="top-2"
                         x-transition:leave-end="top-10">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 p-1"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <p>System preferences</p>
                    </div>
                </div>
            </button>
        </div>
    </div>
</nav>
