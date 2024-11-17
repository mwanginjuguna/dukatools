<footer class="text-slate-800 dark:text-slate-100 bg-slate-50 dark:bg-slate-950">
    <div class="mx-auto w-full max-w-6xl p-4 py-6 lg:py-8">
        <div class="mb-4 md:flex md:justify-between items-center">
            <div class="mb-6 md:mb-0">
                <a href="{{ config('app.url') }}" class="flex items-center">
                    <x-application-logo class="h-8" />
                    <span class="pl-1 self-center text-2xl font-semibold whitespace-nowrap text-amber-600 dark:text-amber-400">{{ config('app.name') }}</span>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-8 sm:gap-6 items-center text-sm">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="{{ route('about') }}" class="hover:underline ">About Us</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('blog') }}" class="hover:underline">Blog</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="{{ route('privacy-policy') }}" class="hover:underline">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="{{ route('terms-and-conditions') }}" class="hover:underline">Terms &amp; Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="py-5 sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">&copy; {{ now()->year }} <a href="{{ config('app.url') }}" class="hover:underline pe-1">{{ config('app.name') }} Ltd.</a>&trade;. All Rights Reserved.
          </span>

            <x-utils.social-icons />
        </div>
    </div>
</footer>
