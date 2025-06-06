<x-guest-layout>
    <x-slot name="title">
        Business Directory
    </x-slot>

    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl md:text-6xl">
                    Business Directory
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Discover and connect with businesses in our network
                </p>
            </div>

            <!-- Search and Filter Section -->
            <div class="mb-8">
                <div class="max-w-xl mx-auto">
                    <div class="relative">
                        <input type="text"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Search businesses...">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Grid -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse($businesses as $business)
                    <a href="{{ route('businesses.show', $business->slug) }}"
                       class="group relative bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                        <!-- Business Logo -->
                        <div class="aspect-w-16 aspect-h-9 bg-gray-200">
                            @if($business->logo)
                                <img src="{{ str_replace('via.placeholder.com', 'placehold.co', $business->logo) }}"
                                     alt="{{ $business->name }}"
                                     class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 flex items-center justify-center bg-gray-100">
                                    <span class="text-4xl font-bold text-gray-400">
                                        {{ substr($business->name, 0, 1) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Business Info -->
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-200">
                                {{ $business->name }}
                            </h3>

                            @if($business->description)
                                <p class="mt-2 text-gray-600 line-clamp-2">
                                    {{ $business->description }}
                                </p>
                            @endif

                            <div class="mt-4 flex items-center space-x-4">
                                @if($business->location)
                                    <div class="flex items-center text-gray-500">
                                        <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span>{{ $business->location->name }}</span>
                                    </div>
                                @endif

                                @if($business->website)
                                    <div class="flex items-center text-gray-500">
                                        <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                        </svg>
                                        <span>Website</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No businesses found</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by adding a new business.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($businesses->hasPages())
                <div class="mt-8">
                    {{ $businesses->links() }}
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>

