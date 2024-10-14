@props(['button' => true, 'type' => 'submit'])

@if($button)
    <button type="{{ $type ?? 'submit' }}"
            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white hover:text-slate-800 dark:text-slate-800 dark:hover:text-slate-200 bg-emerald-600 dark:bg-emerald-500 rounded-lg hover:bg-emerald-500 dark:hover:bg-emerald-600 transition-all ease-in-out duration-300"
    >
        <svg class="me-1.5 inline-block size-5 opacity-75" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>

        <span>{{ $slot ?? 'Add New' }}</span>
    </button>
@else
    <a
        href="{{ $attributes }}"
        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white hover:text-slate-800 dark:text-slate-800 dark:hover:text-slate-200 bg-emerald-600 dark:bg-emerald-500 rounded-lg hover:bg-emerald-500 dark:hover:bg-emerald-600 transition-all ease-in-out duration-300"
    >
        <svg class="me-1.5 inline-block size-5 opacity-75" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>

        <span>{{ $slot ?? 'Add New' }}</span>
    </a>
@endif
