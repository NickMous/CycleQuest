@props(['value'])

<label {{ $attributes->merge(['class' => 'absolute tracking-[.03125em] text-base text-white dark:text-white bg-gray-500 dark:bg-gray-400 rounded duration-300 transform px-1 -translate-y-7 scale-75 top-4 z-10 origin-[0] left-4 peer-focus:left-4 peer-focus:text-text dark:peer-focus:text-dm-text peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:text-gray-500 peer-placeholder-shown:bg-transparent dark:peer-placeholder-shown:bg-transparent dark:peer-placeholder-shown:text-gray-400 peer-focus:scale-75 peer-focus:-translate-y-7 peer-focus:bg-se dark:peer-focus:bg-dm-se peer-focus:px-1 peer-invalid:text-error-600 dark:peer-invalid:text-error-200']) }}>
    {{ $value ?? $slot }}
</label>
