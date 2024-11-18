<x-app-layout>
    <x-slot:title>User Details</x-slot:title>

    <div class="max-w-5xl mx-auto px-4 py-10 md:py-16 text-slate-900 dark:text-slate-100">
        <h1 class="py-2 text-2xl font-medium lg:text-4xl">
            <span class="text-emerald-600 dark:text-emerald-500">{{ $user->name }}</span>.
        </h1>

        <livewire:users.show :$user />
    </div>
</x-app-layout>
