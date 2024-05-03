<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-se-300 dark:bg-dm-se-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-dm-text uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white dark:hover:text-black focus:bg-gray-700 dark:focus:bg-white dark:focus:text-black active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-se dark:focus:ring-dm-se focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
