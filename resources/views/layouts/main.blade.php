<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{
      darkMode: localStorage.getItem('darkMode')
      || localStorage.setItem('darkMode', 'system'),
      first: localStorage.getItem('first') || localStorage.setItem('first', 'false'),
        init() {
          console.log(this.first)
            if (this.first === 'true' || this.first === undefined) {
            console.log('works')
            localStorage.setItem('first', 'false')
            location.reload()
            }
          }
      }"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      x-bind:class="{'dark': darkMode === 'dark' || (darkMode === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'No Title' }} | {{ __('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="bg-bg dark:bg-dm-bg transition-colors">
<livewire:navigation-menu/>
<div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
    {{ $slot }}
</div>
@livewireScripts
</body>
</html>
