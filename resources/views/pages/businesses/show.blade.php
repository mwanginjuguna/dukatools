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
                        @if($business->details && $business->details->price_range)
                            <p class="mt-1 text-lg text-gray-300">
                                Price Range: {{ $business->details->price_range }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Structured Data -->
        @if($business->details)
            <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "LocalBusiness",
                "name": "{{ $business->name }}",
                @if($business->details->legal_name)
                    "legalName": "{{ $business->details->legal_name }}",
                @endif
                @if($business->details->alternate_name)
                    "alternateName": "{{ $business->details->alternate_name }}",
                @endif
                @if($business->details->address)
                    "address": {
                        "@type": "PostalAddress",
                        @if($business->details->address['streetAddress'])
                            "streetAddress": "{{ $business->details->address['streetAddress'] }}",
                        @endif
                        @if($business->details->address['addressLocality'])
                            "addressLocality": "{{ $business->details->address['addressLocality'] }}",
                        @endif
                        @if($business->details->address['addressRegion'])
                            "addressRegion": "{{ $business->details->address['addressRegion'] }}",
                        @endif
                        @if($business->details->address['postalCode'])
                            "postalCode": "{{ $business->details->address['postalCode'] }}",
                        @endif
                        "addressCountry": "KE"
                    },
                @endif
                @if($business->details->latitude && $business->details->longitude)
                    "geo": {
                        "@type": "GeoCoordinates",
                        "latitude": {{ $business->details->latitude }},
                        "longitude": {{ $business->details->longitude }}
                    },
                @endif
                @if($business->email)
                    "email": "{{ $business->email }}",
                @endif
                @if($business->phone_number)
                    "telephone": "{{ $business->phone_number }}",
                @endif
                @if($business->website)
                    "url": "{{ $business->website }}",
                @endif
                @if($business->details->opening_hours)
                    "openingHours": {{ json_encode($business->details->opening_hours) }},
                @endif
                @if($business->details->price_range)
                    "priceRange": "{{ $business->details->price_range }}",
                @endif
                @if($business->details->payment_accepted)
                    "paymentAccepted": "{{ $business->details->payment_accepted }}",
                @endif
                @if($business->details->aggregate_rating && $business->details->rating_count > 0)
                    "aggregateRating": {
                        "@type": "AggregateRating",
                        "ratingValue": {{ $business->details->aggregate_rating }},
                        "ratingCount": {{ $business->details->rating_count }}
                    },
                @endif
                @if($business->description)
                    "description": "{{ $business->description }}",
                @endif
                @if($business->details->slogan)
                    "slogan": "{{ $business->details->slogan }}",
                @endif
                @if($business->details->founding_date)
                    "foundingDate": "{{ $business->details->founding_date }}",
                @endif
                @if($business->details->duns)
                    "duns": "{{ $business->details->duns }}",
                @endif
                @if($business->details->tax_id)
                    "taxID": "{{ $business->details->tax_id }}",
                @endif
                @if($business->details->currencies_accepted)
                    "currenciesAccepted": {{ json_encode($business->details->currencies_accepted) }},
                @endif
                @if($business->details->serves_cuisine)
                    "servesCuisine": {{ json_encode($business->details->serves_cuisine) }},
                @endif
                @if($business->details->business_type)
                    "additionalType": "{{ $business->details->business_type }}",
                @endif
                @if($business->details->awards)
                    "awards": "{{ $business->details->awards }}",
                @endif
                @if($business->logo)
                    "logo": "{{ str_replace('via.placeholder.com', 'placehold.co', $business->logo) }}",
                @endif
                @if($business->details->photos)
                    "photo": {{ json_encode($business->details->photos) }},
                @endif
                @if($business->details->social_media)
                    "sameAs": {{ json_encode($business->details->social_media) }}
                @endif
            }
            </script>
        @endif

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
                            @if($business->details && $business->details->slogan)
                                <p class="text-gray-600 italic mt-2">
                                    "{{ $business->details->slogan }}"
                                </p>
                            @endif
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

                            @if($business->details && $business->details->address)
                                <div class="flex items-center space-x-3">
                                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-gray-600">
                                        {{ $business->details->address['streetAddress'] ?? '' }}
                                        {{ $business->details->address['addressLocality'] ? ', ' . $business->details->address['addressLocality'] : '' }}
                                        {{ $business->details->address['addressRegion'] ? ', ' . $business->details->address['addressRegion'] : '' }}
                                        {{ $business->details->address['postalCode'] ? ', ' . $business->details->address['postalCode'] : '' }}
                                    </span>
                                </div>
                            @endif
                            @if($business->details && $business->details->payment_accepted)
                                <div class="flex items-center space-x-3">
                                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <span class="text-gray-600">{{ $business->details->payment_accepted }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Opening Hours -->
                    @if($business->details && $business->details->opening_hours)
                        <div class="bg-white shadow rounded-lg p-6 mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Opening Hours</h2>
                            <ul class="text-gray-600">
                                @foreach($business->details->opening_hours as $hours)
                                    <li>{{ $hours }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

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
                            @if($business->details && $business->details->business_type)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Business Type</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $business->details->business_type }}</dd>
                                </div>
                            @endif
                            @if($business->details && $business->details->founding_date)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Founded</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $business->details->founding_date }}</dd>
                                </div>
                            @endif
                        </dl>
                    </div>

                    <!-- Location Card -->
                    @if($business->location || ($business->details && ($business->details->latitude && $business->details->longitude)))
                        <div class="bg-white shadow rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Location</h3>
                            <div class="aspect-w-16 aspect-h-9">
                                @if($business->details && $business->details->latitude && $business->details->longitude)
                                    <!-- Placeholder for map integration -->
                                    <div class="w-full h-48 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <span class="text-gray-500">Map: {{ $business->location->name ?? 'Location' }}</span>
                                    </div>
                                @else
                                    <div class="w-full h-48 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <span class="text-gray-500">{{ $business->location->name ?? 'No location specified' }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Social Media -->
                    @if($business->details && $business->details->social_media)
                        <div class="bg-white shadow rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Follow Us</h3>
                            <div class="flex space-x-4">
                                @foreach($business->details->social_media as $platform => $url)
                                    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:text-blue-800">
                                        {{ ucfirst($platform) }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
