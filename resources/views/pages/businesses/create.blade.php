<x-guest-layout>
    <x-slot name="title">
        Register Your Business
    </x-slot>

    <div class="min-h-screen bg-gray-50 py-12"
         x-data="{
            currentTab: {{ auth()->check() ? 2 : 1 }},
            isLogin: true,
            branches: [],
            progress: {{ auth()->check() ? 25 : 25 }},
            isAuthenticated: {{ auth()->check() ? 'true' : 'false' }},
            totalTabs: {{ auth()->check() ? 4 : 5 }},
            nextTab() {
                if (this.currentTab < this.totalTabs) {
                    this.currentTab++;
                    this.progress = (this.currentTab / this.totalTabs) * 100;
                }
            },
            previousTab() {
                if (this.currentTab > 1) {
                    this.currentTab--;
                    this.progress = (this.currentTab / this.totalTabs) * 100;
                }
            },
            addBranch() {
                this.branches.push({
                    name: '',
                    phone_number: '',
                    address: ''
                });
            },
            removeBranch(index) {
                this.branches.splice(index, 1);
            }
         }">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">Register Your Business</h1>
                    <p class="mt-2 text-gray-600">Fill in your business details to get started</p>
                </div>

                <!-- Progress Bar -->
                <div class="mb-8">
                    <div class="relative">
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
                            <div class="transition-all duration-500 ease-out shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"
                                 :style="'width: ' + progress + '%'"></div>
                        </div>
                        <div class="flex justify-between text-xs text-gray-600">
                            <template x-if="!isAuthenticated">
                                <div class="text-center" :class="{ 'text-blue-600 font-bold': currentTab >= 1 }">Account</div>
                            </template>
                            <div class="text-center" :class="{ 'text-blue-600 font-bold': currentTab >= (isAuthenticated ? 1 : 2) }">Basic Info</div>
                            <div class="text-center" :class="{ 'text-blue-600 font-bold': currentTab >= (isAuthenticated ? 2 : 3) }">Contact</div>
                            <div class="text-center" :class="{ 'text-blue-600 font-bold': currentTab >= (isAuthenticated ? 3 : 4) }">Details</div>
                            <div class="text-center" :class="{ 'text-blue-600 font-bold': currentTab >= (isAuthenticated ? 4 : 5) }">Branches</div>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form action="{{ route('businesses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Account Tab (Only for guests) -->
                    @guest
                        <div x-show="!isAuthenticated && currentTab === 1" class="space-y-6">
                            <div class="flex justify-center space-x-4 mb-6">
                                <button type="button" @click="isLogin = true"
                                        :class="{ 'bg-blue-600 text-white': isLogin, 'bg-gray-100 text-gray-700': !isLogin }"
                                        class="px-4 py-2 rounded-md">
                                    Login
                                </button>
                                <button type="button" @click="isLogin = false"
                                        :class="{ 'bg-blue-600 text-white': !isLogin, 'bg-gray-100 text-gray-700': isLogin }"
                                        class="px-4 py-2 rounded-md">
                                    Register
                                </button>
                            </div>

                            <!-- Login Form -->
                            <div x-show="isLogin" class="space-y-4">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="login_email" id="login_email" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                    <input type="password" name="login_password" id="login_password" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>

                            <!-- Registration Form -->
                            <div x-show="!isLogin" class="space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                    <input type="text" name="user_name" id="user_name" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="user_email" id="user_email" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                    <input type="password" name="user_password" id="user_password" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                    <input type="password" name="user_password_confirmation" id="user_password_confirmation" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                    @endguest

                    <!-- Basic Info Tab -->
                    <div x-show="currentTab === (isAuthenticated ? 1 : 2)" class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Business Name *</label>
                            <div class="mt-1">
                                <input type="text" name="name" id="name" required
                                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                       value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="logo" class="block text-sm font-medium text-gray-700">Business Logo</label>
                            <div class="mt-1 flex items-center">
                                <div class="flex-shrink-0">
                                    <img id="logo-preview" class="h-32 w-32 rounded-lg object-cover hidden" src="#" alt="Logo preview">
                                </div>
                                <div class="ml-4">
                                    <input type="file" name="logo" id="logo" accept="image/*"
                                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                           onchange="previewLogo(this)">
                                </div>
                            </div>
                            @error('logo')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <div class="mt-1">
                                <textarea name="description" id="description" rows="4"
                                          class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>
                            </div>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Contact Tab -->
                    <div x-show="currentTab === (isAuthenticated ? 2 : 3)" class="space-y-6">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Business Email</label>
                                <input type="email" name="email" id="email"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                       value="{{ old('email') }}">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            </div>

                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="tel" name="phone_number" id="phone_number"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                       value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            </div>
                        </div>

                        <div>
                            <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                    https://
                                </span>
                                <input type="text" name="website" id="website"
                                       class="flex-1 min-w-0 block w-full rounded-none rounded-r-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       value="{{ old('website') }}"
                                       placeholder="example.com"
                                       pattern="[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}"
                                       title="Please enter a valid domain name">
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Optional - Enter your domain name (e.g., example.com)</p>
                            @error('website')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" name="address" id="address"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   value="{{ old('address') }}">
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700">Location *</label>
                            <input type="text" name="location" id="location" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   value="{{ old('location') }}"
                                   placeholder="Enter your business location">
                            @error('location')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Business Details Tab -->
                    <div x-show="currentTab === (isAuthenticated ? 3 : 4)" class="space-y-6">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div>
                                <label for="legal_name" class="block text-sm font-medium text-gray-700">Legal Business Name</label>
                                <input type="text" name="legal_name" id="legal_name"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                       value="{{ old('legal_name') }}">
                            </div>

                            <div>
                                <label for="alternate_name" class="block text-sm font-medium text-gray-700">Alternate Name</label>
                                <input type="text" name="alternate_name" id="alternate_name"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                       value="{{ old('alternate_name') }}">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div>
                                <label for="business_type" class="block text-sm font-medium text-gray-700">Business Type</label>
                                <select name="business_type" id="business_type"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Select Type</option>
                                    <option value="sole_proprietorship">Sole Proprietorship</option>
                                    <option value="partnership">Partnership</option>
                                    <option value="corporation">Corporation</option>
                                    <option value="llc">LLC</option>
                                </select>
                            </div>

                            <div>
                                <label for="founding_date" class="block text-sm font-medium text-gray-700">Founding Date</label>
                                <input type="date" name="founding_date" id="founding_date"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                       value="{{ old('founding_date') }}">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div>
                                <label for="tax_id" class="block text-sm font-medium text-gray-700">Tax ID</label>
                                <input type="text" name="tax_id" id="tax_id"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                       value="{{ old('tax_id') }}">
                            </div>

                            <div>
                                <label for="duns" class="block text-sm font-medium text-gray-700">DUNS Number</label>
                                <input type="text" name="duns" id="duns"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                       value="{{ old('duns') }}">
                            </div>
                        </div>

                        <div>
                            <label for="price_range" class="block text-sm font-medium text-gray-700">Price Range</label>
                            <select name="price_range" id="price_range"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Select Price Range</option>
                                <option value="$">$ (Budget)</option>
                                <option value="$$">$$ (Moderate)</option>
                                <option value="$$$">$$$ (Expensive)</option>
                                <option value="$$$$">$$$$ (Luxury)</option>
                            </select>
                        </div>

                        <div>
                            <label for="payment_accepted" class="block text-sm font-medium text-gray-700">Payment Methods Accepted</label>
                            <div class="mt-2 space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" name="payment_methods[]" value="cash" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <label class="ml-2 text-sm text-gray-700">Cash</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="payment_methods[]" value="credit_card" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <label class="ml-2 text-sm text-gray-700">Credit Card</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="payment_methods[]" value="mobile_payment" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <label class="ml-2 text-sm text-gray-700">Mobile Payment</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="payment_methods[]" value="bank_transfer" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <label class="ml-2 text-sm text-gray-700">Bank Transfer</label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="currencies_accepted" class="block text-sm font-medium text-gray-700">Currencies Accepted</label>
                            <div class="mt-2 space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" name="currencies[]" value="KES" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <label class="ml-2 text-sm text-gray-700">KES (Kenyan Shilling)</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="currencies[]" value="USD" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <label class="ml-2 text-sm text-gray-700">USD (US Dollar)</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="currencies[]" value="EUR" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <label class="ml-2 text-sm text-gray-700">EUR (Euro)</label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="slogan" class="block text-sm font-medium text-gray-700">Business Slogan</label>
                            <input type="text" name="slogan" id="slogan"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   value="{{ old('slogan') }}">
                        </div>

                        <div>
                            <label for="awards" class="block text-sm font-medium text-gray-700">Awards & Recognition</label>
                            <textarea name="awards" id="awards" rows="3"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                      placeholder="List any awards or recognition your business has received">{{ old('awards') }}</textarea>
                        </div>

                        <div>
                            <label for="social_media" class="block text-sm font-medium text-gray-700">Social Media Links</label>
                            <div class="mt-2 space-y-2">
                                <input type="url" name="social_media[facebook]" placeholder="Facebook URL"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <input type="url" name="social_media[twitter]" placeholder="Twitter URL"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <input type="url" name="social_media[instagram]" placeholder="Instagram URL"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <input type="url" name="social_media[linkedin]" placeholder="LinkedIn URL"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Branches Tab -->
                    <div x-show="currentTab === (isAuthenticated ? 4 : 5)" class="space-y-6">
                        <div class="space-y-4" x-ref="branchesContainer">
                            <template x-for="(branch, index) in branches" :key="index">
                                <div class="p-4 border rounded-lg space-y-4">
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-lg font-medium">Branch <span x-text="index + 1"></span></h3>
                                        <button type="button" @click="removeBranch(index)" class="text-red-600 hover:text-red-800">
                                            Remove
                                        </button>
                                    </div>

                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                        <div>
                                            <label :for="'branch_name_' + index" class="block text-sm font-medium text-gray-700">Branch Name</label>
                                            <input type="text" :name="'branches[' + index + '][name]'" :id="'branch_name_' + index"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        </div>
                                        <div>
                                            <label :for="'branch_phone_' + index" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                            <input type="tel" :name="'branches[' + index + '][phone_number]'" :id="'branch_phone_' + index"
                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        </div>
                                    </div>

                                    <div>
                                        <label :for="'branch_address_' + index" class="block text-sm font-medium text-gray-700">Address</label>
                                        <input type="text" :name="'branches[' + index + '][address]'" :id="'branch_address_' + index"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>
                            </template>
                        </div>

                        <button type="button" @click="addBranch"
                                class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Add Branch
                        </button>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between pt-4">
                        <button type="button" x-show="currentTab > (isAuthenticated ? 1 : 1)" @click="previousTab"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Previous
                        </button>
                        <button type="button" x-show="currentTab < totalTabs" @click="nextTab"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Next
                        </button>
                        <button type="submit" x-show="currentTab === totalTabs"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Register Business
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @pushOnce('scripts')
    <script>
        function previewLogo(input) {
            const preview = document.getElementById('logo-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @endPushOnce
</x-guest-layout>
