@php
    use RalphJSmit\Laravel\SEO\Support\SEOData;
    if (!isset($seo)) {
        $title = $title ?? 'No Title';
        $title .= ' | ' . __('app.name');
        $seo = $seo ?? seo(new SEOData(title: $title));
    }
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{
      darkMode: localStorage.getItem('darkMode')
      || localStorage.setItem('darkMode', 'system'),
      first: localStorage.getItem('first') || localStorage.setItem('first', 'false')}"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val)); first === 'false' ? localStorage.setItem('first', 'true') && location.reload() : null"
      x-bind:class="{'dark': darkMode === 'dark' || (darkMode === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <!-- googlefonts -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="/storage/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/storage/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/storage/favicon/favicon-16x16.png">
    <link rel="manifest" href="/storage/favicon/site.webmanifest">
    <link rel="mask-icon" href="/storage/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/storage/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/storage/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- SEO -->
    {!! $seo !!}

    <!-- Sentry Replay SDK -->
    <script
        src="https://sentry.nickmous.com/js-sdk-loader/902155d7344fe42d9d6d6ab8d0096851.min.js"
        crossorigin="anonymous"
    ></script>
</head>
<body class="bg-bg dark:bg-dm-bg transition-colors min-h-screen">
<div class="absolute min-w-full">
    <livewire:navigation-menu/>
</div>
<div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
    {{ $slot }}
</div>
@livewireScripts
</body>
</html>
