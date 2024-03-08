@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-pr dark:border-dm-pr text-sm font-medium leading-5 text-text dark:text-dm-text focus:outline-none focus:border-ac dark:focus:-border-dm-ac transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-text/50 dark:text-dm-text/50 hover:text-text dark:hover:text-dm-text hover:border-ac dark:hover:border-dm-ac focus:outline-none focus:text-text dark:focus:text-dm-text focus:border-pr dark:focus:border-dm-pr transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} wire:navigate>
    {{ $slot }}
</a>
