<button
    {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center px-4 py-2 bg-emerald-500 dark:bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-emerald-50 dark:text-emerald-50 uppercase tracking-widest hover:bg-emerald-600 dark:hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 dark:focus:ring-offset-emerald-400 transition ease-in-out duration-300'
    ]) }}
>
    {{ $slot }}
</button>
