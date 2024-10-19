@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center w-full px-2 py-1 border-l-2 border-emerald-400 dark:border-emerald-600 text-sm font-medium leading-5 text-emerald-900 dark:text-emerald-100 bg-emerald-100 dark:bg-emerald-900 focus:outline-none focus:border-emerald-700 transition duration-300 ease-in-out'
            : 'inline-flex items-center w-full px-2 py-1 border-l-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-emerald-600 dark:hover:text-emerald-400 hover:border-emerald-300 dark:hover:border-emerald-700 hover:bg-emerald-100 dark:hover:bg-emerald-900 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
