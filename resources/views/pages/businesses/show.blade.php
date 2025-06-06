<x-guest-layout>
    <x-slot name="title">
        {{ $business->name }} - Business Profile
    </x-slot>

    <div class="bg-white">
        <!-- Hero Section -->
        <div class="relative bg-gray-800">
            <div class="absolute inset-0">
                @if($business->logo)
                    <img class="w-full h-full object-cover opacity-20" src="{{ str_replace('via.placeholder.com', 'placehold.co', $business->logo) }}" alt="{{ $business->name }}">
                @endif
                <div class="absolute inset-0 bg-gray-800 mix-blend-multiply"></div>
            </div>
            <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                <div class="flex items-center space-x-6">
                    @if($business->logo)
                        <img class="h-24 w-24 rounded-lg shadow-lg" src="{{ str_replace('via.placeholder.com', 'placehold.co', $business->logo) }}" alt="{{ $business->name }}">
                    @endif
                    <div>
                        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                            {{ $business->name }}
                        </h1>
                        @if($business->location)
                            <p class="mt-2 text-xl text-gray-300">
                                {{ $business->location->name }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="lg:grid lg:grid-cols-3 lg:gap-8">
                <!-- Left Column -->
                <div class="lg:col-span-2">
                    <!-- About Section -->
                    <div class="bg-white shadow rounded-lg p-6 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">About</h2>
                        <div class="prose max-w-none">
                            <p class="text-gray-600">
                                {{ $business->description ?? 'No description available.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="bg-white shadow rounded-lg p-6 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Contact Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @if($business->email)
                                <div class="flex items-center space-x-3">
                                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <a href="mailto:{{ $business->email }}" class="text-blue-600 hover:text-blue-800">
                                        {{ $business->email }}
                                    </a>
                                </div>
                            @endif

                            @if($business->phone_number)
                                <div class="flex items-center space-x-3">
                                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <a href="tel:{{ $business->phone_number }}" class="text-blue-600 hover:text-blue-800">
                                        {{ $business->phone_number }}
                                    </a>
                                </div>
                            @endif

                            @if($business->website)
                                <div class="flex items-center space-x-3">
                                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                    </svg>
                                    <a href="{{ $business->website }}" target="_blank" rel="noopener noreferrer"
                                       class="text-blue-600 hover:text-blue-800">
                                        Visit Website
                                    </a>
                                </div>
                            @endif

                            @if($business->address)
                                <div class="flex items-center space-x-3">
                                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-gray-600">{{ $business->address }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Branches Section -->
                    @if($business->branches->count() > 0)
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Branches</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach($business->branches as $branch)
                                    <div class="border rounded-lg p-4">
                                        <h3 class="font-semibold text-lg text-gray-900">{{ $branch->name }}</h3>
                                        @if($branch->address)
                                            <p class="text-gray-600 mt-1">{{ $branch->address }}</p>
                                        @endif
                                        @if($branch->phone_number)
                                            <p class="text-gray-600 mt-1">{{ $branch->phone_number }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right Column -->
                <div class="mt-8 lg:mt-0 lg:col-span-1">
                    <!-- Quick Info Card -->
                    <div class="bg-white shadow rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Info</h3>
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Reference</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $business->reference }}</dd>
                            </div>
                            @if($business->vendor)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Vendor</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $business->vendor->name }}</dd>
                                </div>
                            @endif
                            @if($business->user)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Owner</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $business->user->name }}</dd>
                                </div>
                            @endif
                        </dl>
                    </div>

                    <!-- Location Card -->
                    @if($business->location)
                        <div class="bg-white shadow rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Location</h3>
                            <div class="aspect-w-16 aspect-h-9">
                                <!-- Add a map component here if you have one -->
                                <div class="w-full h-48 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-500">{{ $business->location->name }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
