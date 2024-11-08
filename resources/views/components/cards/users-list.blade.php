@props(['users'])

<div>
    <ul class="max-w-xs flex flex-col">
        @forelse($users as $user)
            <li class="inline-flex items-center gap-x-3.5 py-3 px-4 text-sm font-medium bg-white border border-slate-200 text-slate-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-slate-800 dark:border-slate-700 dark:text-slate-100">
                <x-utils.user-avatar :$user />
            </li>
        @empty
            <p class="py-1 flex flex-row items-center gap-x-1 text-xs text-slate-600 dark:text-slate-500">
                <svg class="w-4 h-4 pe-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                No data yet.</p>
        @endforelse
    </ul>
</div>
