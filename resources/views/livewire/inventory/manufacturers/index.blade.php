<div class="max-w-5xl mx-auto">
    <!-- Breadcrumb -->
    <x-parts.inventory.invtry-breadcrumb title="Manufacturers" count="{{ $manufacturerCount }}" />

    <!-- accordion for filtering brands -->
    <section
        x-data="{tabItem1:true,tabItem2:false,tabItem3:false,
        toggleTab1(){this.tabItem1=true;this.tabItem2=false;this.tabItem3=false;},
        toggleTab2(){this.tabItem1=false;this.tabItem2=true;this.tabItem3=false;},
        toggleTab3(){this.tabItem1=false;this.tabItem2=false;this.tabItem3=true;},
        }"
        class="relative mt-6 py-3"
    >
        <nav class="relative z-0 flex border rounded-t-md overflow-hidden text-xs lg:text-sm font-medium dark:border-slate-700">
            <button
                @click="toggleTab1()"
                :class="tabItem1 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-slate-500 hover:text-slate-700 dark:text-slate-400 `"
                class="relative min-w-0 flex-1 bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400" id="tabItem1">
                Manufacturers <span class="bg-emerald-100 text-emerald-800 text-xs px-1 py-0.5 rounded dark:bg-emerald-800 dark:text-emerald-200 inline-flex">
                        {{ $manufacturerCount }}
                    </span>
            </button>
            <button
                @click="toggleTab2()"
                :class="tabItem2 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-slate-500 hover:text-slate-700 dark:text-slate-400 `"
                class="relative min-w-0 flex-1 bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400" id="tabItem1">
                Add Manufacturer <span class="bg-emerald-100 text-emerald-800 text-xs px-1 py-0.5 rounded dark:bg-emerald-800 dark:text-emerald-200 inline-flex">
                        new
                    </span>
            </button>
        </nav>

        <div class="p-4 border border-t-0 border-slate-200 dark:border-slate-800 shadow-sm rounded-b-md">

            <!-- Tab Item 1: Manufacturers -->
            <div x-show="tabItem1" class="grid space-y-3">
                <div class="mb-4 py-3 w-full flex flex-col md:flex-row gap-3 md:gap-0 md:justify-between md:items-center border-b border-slate-200 dark:border-slate-900">
                    <div>
                        <h4 class="mb-1 font-semibold text-lg">Manufacturers</h4>
                        <p class="mb-1 text-xs text-slate-500 dark:text-slate-600"><em class="uppercase">Partners in production.</em></p>
                    </div>
                </div>

                <!-- Manufacturer details with products delivered -->
                @if($isView === true)
                    <div>
                        <!-- Grid -->
                        <div class="grid md:grid-cols-2 gap-3">
                            <div>
                                <div class="grid space-y-3">
                                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                            Email:
                                        </dt>
                                        <dd class="text-gray-800 dark:text-neutral-200">
                                            <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500" href="#">
                                                {{ $selectedManufacturer->email }}
                                            </a>
                                        </dd>
                                    </dl>

                                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                            Manufacturer details:
                                        </dt>
                                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                                            <span class="block font-semibold">{{ $selectedManufacturer->fullName }}</span>
                                        </dd>
                                    </dl>

                                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                            Phone:
                                        </dt>
                                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $selectedManufacturer->phone_number }}
                                        </dd>
                                    </dl>

                                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                            Location:
                                        </dt>
                                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $selectedManufacturer->address ?? '' }}
                                        </dd>
                                    </dl>

                                </div>
                            </div>
                            <!-- Col -->

                            <div>
                                <div class="grid space-y-3">
                                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                            Manufacturer ID:
                                        </dt>
                                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $selectedManufacturer->reference }}
                                        </dd>
                                    </dl>

                                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                                            Total Products:
                                        </dt>
                                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $selectedManufacturer->products_count }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <!-- Col -->
                        </div>
                    </div>

                    @if($selectedManufacturer !== null && $selectedManufacturer->products !== null)
                        <div class="grid grid-cols-3 gap-4">
                            @foreach ($selectedManufacturer->products as $product)
                                <div class="flex items-center justify-center p-2">
                                    <img src="/storage/{{ $product->image }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded-lg">
                                    <div class="ml-2 text-sm">
                                        <div class="text-gray-600 dark:text-gray-400">Product Name:</div>
                                        <div>{{ $product->name }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @else
                    <div class="mt-6 flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border rounded-lg divide-y divide-slate-200 dark:border-slate-800 dark:divide-slate-800">
                                    @if($manufacturerCount > 0)
                                        <!--search-->
                                        <div class="py-3 px-4">
                                            <div class="relative max-w-xs">
                                                <label class="sr-only">Search</label>
                                                <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search" class="py-2 px-3 ps-9 block w-full border-slate-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-emerald-500 focus:ring-emerald-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-slate-400 dark:placeholder-slate-500 dark:focus:ring-slate-600" placeholder="Search for items">
                                                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="11" cy="11" r="8"></circle>
                                                        <path d="m21 21-4.3-4.3"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <!--table-->
                                        <div class="overflow-hidden">
                                            <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                                                <thead class="bg-slate-50 dark:bg-slate-700 text-slate-500 uppercase dark:text-slate-500 text-xs ">
                                                <tr>
                                                    <th scope="col" class="px-2 py-2 md:px-6 md:py-4 pe-0">
                                                        <div class="flex items-center h-3 md:h-5">
                                                            <input id="hs-table-pagination-checkbox-all" type="checkbox" class="border-slate-200 rounded text-emerald-600 focus:ring-emerald-500 dark:bg-slate-700 dark:border-slate-500 dark:checked:bg-emerald-500 dark:checked:border-emerald-500 dark:focus:ring-offset-slate-800">
                                                            <label for="hs-table-pagination-checkbox-all" class="sr-only">Checkbox</label>
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-start">Name</th>
                                                    <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-start">Email</th>
                                                    <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-start">Phone No.</th>
                                                    <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-end">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                                                @foreach($manufacturers as $manufacturer)
                                                    <tr>
                                                        <td class="px-2 ps-2 md:px-6 md:ps-4">
                                                            <div class="flex items-center h-3 md:h-5">
                                                                <input id="hs-table-pagination-checkbox-1" type="checkbox" class="border-slate-200 rounded text-emerald-600 focus:ring-emerald-500 dark:bg-slate-800 dark:border-slate-700 dark:checked:bg-emerald-500 dark:checked:border-emerald-500 dark:focus:ring-offset-slate-800">
                                                                <label for="hs-table-pagination-checkbox-1" class="sr-only">Checkbox</label>
                                                            </div>
                                                        </td>
                                                        <td class="px-2 py-2 md:px-6 md:py-4">
                                                            {{ $manufacturer->fullName }}
                                                        </td>

                                                        <td class="px-2 py-2 md:px-6 md:py-4">
                                                            {{ $manufacturer->email }}
                                                        </td>
                                                        <td class="px-2 py-2 md:px-6 md:py-4">
                                                            {{ $manufacturer->phone_number }}
                                                        </td>
                                                        <td
                                                            class="px-2 py-2 md:px-6 md:py-4 whitespace-nowrap text-end font-medium"
                                                        >
                                                            <button
                                                                wire:click="viewManufacturer({{$manufacturer->id}})"
                                                                type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-emerald-600 hover:text-emerald-800 focus:outline-none focus:text-emerald-800 disabled:opacity-50 disabled:pointer-events-none dark:text-emerald-500 dark:hover:text-emerald-400 dark:focus:text-emerald-400"
                                                            >View</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- footer pagination -->
                                        <div class="pt-3 py-1 px-4 text-xs">
                                            {{ $manufacturers->onEachSide(1)->links() }}
                                        </div>
                                    @else
                                        <!-- empty state -->
                                        <x-parts.inventory.table-empty-state />
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

            <!-- Tab Item 2: Create Manufacturer -->
            <div x-show="tabItem2" class="grid space-y-3">
                <div class="mb-4 py-3 w-full flex flex-col md:flex-row gap-3 md:gap-0 md:justify-between md:items-center border-b border-slate-200 dark:border-slate-900">
                    <div>
                        <h4 class="mb-1 font-semibold text-lg">New Manufacturer</h4>
                        <p class="mb-1 text-xs text-slate-500 dark:text-slate-600"><em class="uppercase">Karibu!</em></p>
                    </div>
                </div>

                <div class="mt-6">
                    <form class="max-w-md mx-auto" wire:submit="saveManufacturer">
                        @csrf
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="email" name="email" id="email"
                                   wire:model="form.email"
                                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="first_name" id="first_name"
                                       wire:model="form.firstName"
                                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="last_name" id="last_name"
                                       wire:model="form.lastName"
                                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="tel" name="form.phone_number" id="form.phone_number"
                                       wire:model="form.phone"
                                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="form.phone_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number (123-456-7890)</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" name="form.location" id="form.location"
                                       wire:model="form.location"
                                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="form.location" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Country (Ex. Kenya)</label>
                            </div>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- manufacturer details -->
        <div class="">
        </div>
    </section>


    <!-- Scripts -->
    @script
    <script>


        Livewire.on('manufacturer-saved', () => {
            Swal.fire({title:'Manufacturer Created!', text:'Manufacturer details have been saved successfully.', icon:'success'});
        })
    </script>
    @endscript
</div>
