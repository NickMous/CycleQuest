@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-pr dark:border-dm-pr text-start text-base font-medium text-text-700 dark:text-text-800 bg-bg-400 dark:bg-dm-bg-600 focus:outline-none focus:text-text dark:focus:text-dm-text focus:bg-ac dark:focus:bg-dm-ac focus:border-ac-300 dark:focus:border-dm-ac-300 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-text dark:text-dm-text focus:outline-none focus:text-text dark:focus:text-dm-text focus:bg-ac dark:focus:bg-dm-ac focus:border-ac-300 dark:focus:border-dm-ac-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
