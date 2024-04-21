@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full h-14 block leading-5 relative py-2 px-4 rounded bg-neutral-10 dark:bg-neutral-900 border border-2 focus:border-2 border-gray-500 overflow-x-auto focus:outline-none focus:border-se focus:ring-0 dark:text-gray-200 dark:border-gray-400 dark:focus:border-dm-se peer transition duration-300']) !!}>
