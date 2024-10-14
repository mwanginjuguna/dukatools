@props(['icon' => null, 'button' => null])
<div class="min-h-32 flex flex-col border shadow-sm rounded-xl border-slate-200 dark:border-slate-700 dark:shadow-slate-700/70">
    <div class="flex flex-auto flex-col justify-center items-center place-content center p-4 md:p-5">
        @if($icon === null)
            <svg class="size-10 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19V6a1 1 0 0 1 1-1h4.032a1 1 0 0 1 .768.36l1.9 2.28a1 1 0 0 0 .768.36H16a1 1 0 0 1 1 1v1M3 19l3-8h15l-3 8H3Z"/>
            </svg>
        @else
            {{ $icon }}
        @endif

        @if($slot->isEmpty())
            <div class="mt-2 py-3 md:py-6 text-sm text-slate-800 dark:text-slate-300">
                No Data Found!
            </div>
        @else
            {{ $slot }}
        @endif

        @if($button !== null)
            {{ $button }}
        @endif
    </div>
</div>
