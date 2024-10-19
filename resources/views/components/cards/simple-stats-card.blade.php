<div class="h-max flex flex-col bg-slate-50 dark:bg-slate-900 border hover:border-emerald-200 dark:border-slate-700 dark:hover:border-emerald-800 shadow-sm rounded-xl transition-all ease-in-out duration-300">
    <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-slate-100 rounded-lg dark:bg-slate-800">
            @if($svg)
                {{ $svg }}
            @else
                <svg class="flex-shrink-0 size-5 text-emerald-500 dark:text-emerald-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg>
            @endif
        </div>

        <div class="grow">
            <div class="flex items-center gap-x-2">
                <p class="text-xs uppercase tracking-wide text-slate-800 dark:text-slate-400">
                    {{ $title }}
                </p>
            </div>
            <div class="mt-1 flex items-center gap-x-2">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
