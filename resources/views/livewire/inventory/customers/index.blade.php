<div class="max-w-5xl mx-auto p-4">
    <!-- Breadcrumb -->
    <x-parts.inventory.invtry-breadcrumb title="Customers" count="{{ $customerCount }}" />

    <!-- accordion for filtering brands -->
    <section
        x-data="{tabItem1:true,tabItem2:false,
        toggleTab1(){this.tabItem1=true;this.tabItem2=false;},
        toggleTab2(){this.tabItem1=false;this.tabItem2=true;}
        }"
        class="relative mt-6 py-3"
    >
        <nav class="relative flex text-xs lg:text-sm dark:border-slate-700">
            <button
                @click="toggleTab1()"
                :class="tabItem1 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-slate-500 hover:text-slate-700 dark:text-slate-400 `"
                class="relative bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400" id="tabItem1">
                Customers <span class="bg-emerald-100 text-emerald-800 text-xs px-1 py-0.5 rounded dark:bg-emerald-800 dark:text-emerald-200 inline-flex">
                        {{ $customerCount }}
                    </span>
            </button>
            <button
                @click="toggleTab2()"
                :class="tabItem2 ? `border-b-emerald-500 dark:border-b-emerald-500 text-emerald-500 dark:text-emerald-600` : ` dark:border-l-slate-700 dark:border-b-slate-700 text-slate-500 hover:text-slate-700 dark:text-slate-400 `"
                class="relative bg-slate-100 first:border-s-0 border-s border-b-2 py-4 px-4 text-center overflow-hidden hover:bg-slate-50 focus:z-10 focus:outline-none focus:text-emerald-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:hover:bg-slate-700 dark:hover:text-emerald-400" id="tabItem2">
                Add Customer <span class="bg-emerald-100 text-emerald-800 text-xs px-1 py-0.5 rounded dark:bg-emerald-800 dark:text-emerald-200 inline-flex">
                        new
                    </span>
            </button>
        </nav>

        <div class="border border-t-0 border-r-0 border-slate-200 dark:border-slate-800 shadow-sm rounded-b-md">

            <!-- Tab Item 1: Customers -->
            <div x-show="tabItem1" class="grid space-y-3 py-3">
                <div class="mb-8 p-3 w-full flex flex-col md:flex-row gap-3 md:gap-0 md:justify-between md:items-center border-b border-slate-200 dark:border-slate-900">
                    <div class="pt-4">
                        <h4 class="mb-1 font-semibold text-lg">Customers</h4>
                        <p class="mb-1 text-xs text-slate-500 dark:text-slate-600"><em class="uppercase">Customer purchases and individual sales at POS.</em></p>
                    </div>
                </div>

                <div class="mt-6 pt6 flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="min-w-full inline-block align-middle">
                            <div class="divide-y divide-slate-200 dark:divide-slate-800">
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
                                            <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-start">ID</th>
                                            <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-start">Contact</th>
                                            <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-start">Source</th>
                                            <th scope="col" class="px-2 py-2 md:px-6 md:py-4 text-end">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                                        @foreach($customers as $customer)
                                            <tr>
                                                <td class="px-2 ps-2 md:px-6 md:ps-4">
                                                    <div class="flex items-center h-3 md:h-5">
                                                        <input id="hs-table-pagination-checkbox-1" type="checkbox" class="border-slate-200 rounded text-emerald-600 focus:ring-emerald-500 dark:bg-slate-800 dark:border-slate-700 dark:checked:bg-emerald-500 dark:checked:border-emerald-500 dark:focus:ring-offset-slate-800">
                                                        <label for="hs-table-pagination-checkbox-1" class="sr-only">Checkbox</label>
                                                    </div>
                                                </td>
                                                <td class="px-2 py-2 md:px-6 md:py-4">
                                                    {{ $customer->reference }}
                                                </td>

                                                <td class="px-2 py-2 md:px-6 md:py-4">
                                                    {{  $customer->phone_number ?? $customer->email ?? 'N/A' }}
                                                </td>
                                                <td class="px-2 py-2 md:px-6 md:py-4">
                                                    {{ $customer->source ?? 'N/A'}}
                                                </td>
                                                <td class="px-2 py-2 md:px-6 md:py-4 whitespace-nowrap text-end font-medium">
                                                    <button  wire:click="showCustomer({{$customer->id}})" type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-emerald-600 hover:text-emerald-800 focus:outline-none focus:text-emerald-800 disabled:opacity-50 disabled:pointer-events-none dark:text-emerald-500 dark:hover:text-emerald-400 dark:focus:text-emerald-400">View</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- footer pagination -->
                                <div class="pt-3 py-1 px-4 text-xs">
                                    {{ $customers->onEachSide(1)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tab Item 2: Create Customer -->
            <div x-show="tabItem2" class="grid space-y-3 py-3">
                <div class="mb-4 p-3 w-full flex flex-col md:flex-row gap-3 md:gap-0 md:justify-between md:items-center border-b border-slate-200 dark:border-slate-900">
                    <div>
                        <h4 class="mb-1 font-semibold text-lg">New Customers</h4>
                        <p class="mb-1 text-xs text-slate-500 dark:text-slate-600"><em class="uppercase">Karibu!</em></p>
                    </div>
                </div>

                <div class="mt-6">
                    <form class="max-w-md mx-auto" wire:submit="saveCustomer">
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
    </section>

    <x-modal name="customer-show-modal">
        <div class="p-4 bg-slate-100 dark:bg-slate-900">
            @if(isset($selectedCustomer))
                <div class="flex justify-between items-center">
                    <div class="grow">
                        <h3 class="mb-2 text-lg py-2">
                            <span class="text-xs text-slate-500 dark:text-slate-500">Customer ID:</span> #{{ $selectedCustomer->reference ?? $selectedCustomer->fullName }}
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-neutral-400">
                            {{ $selectedCustomer->email ?? 'No email.' . ' / ' . $selectedCustomer->phone_number ?? 'No phone number.' }}
                        </p>
                    </div>

                    <button
                        @click="$dispatch('close')"
                        type="button"
                    >
                        <svg class="w-6 h-6 text-slate-600 dark:text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                        </svg>
                    </button>
                </div>

                <div class="mt-5 py-2">
                    <div class="space-y-3 py-2 mb-4">
                        <dl class="flex flex-col sm:flex-row gap-1">
                            <dt class="min-w-32">
                                <span class="block text-sm text-gray-500 dark:text-neutral-500">Total Orders:</span>
                            </dt>
                            <dd>
                                <p class="inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                                    {{ $selectedCustomer->orders_count }}
                                </p>
                            </dd>
                        </dl>
                        <dl class="flex flex-col sm:flex-row gap-1">
                            <dt class="min-w-32">
                                <span class="block text-sm text-gray-500 dark:text-neutral-500">Source:</span>
                            </dt>
                            <dd>
                                <p class=" inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                                    {{ $selectedCustomer->source }}
                                </p>
                            </dd>
                        </dl>
                        <dl class="flex flex-col sm:flex-row gap-1">
                            <dt class="min-w-32">
                                <span class="block text-sm text-gray-500 dark:text-neutral-500">Total Spent:</span>
                            </dt>
                            <dd>
                                <p class="inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
                                    Ksh {{ $selectedCustomer->orders->count() > 0 ? number_format($selectedCustomer->orders->sum('total'), 2) : 0 }}
                                </p>
                            </dd>
                        </dl>
                    </div>
                </div>

                @if($selectedCustomer->orders->count() > 0)
                    <p class="mt-4 py-3 text-lg font-medium">Recent Orders</p>
                    <div class="grid gap-y-1 mt-4">
                        @foreach($selectedCustomer->orders as $order)
                            <div class="flex items-center gap-3 px-1 py-3 font-light border-b border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-800 hover:scale-[1.01] group transition-all ease-in-out duration-300">
                                <a href="{{-- route('admin.orders.show', $order->id) --}}" class="hover:underline underline-offset-4 hover:text-emerald-600 dark:hover:text-emerald-400" wire:navigate>
                                    {{ $order->reference }} <span class="inline-flex text-xs text-gray-600 dark:text-gray-400">(Ksh {{ $order->total }})</span>
                                </a>
                                <ul class="text-sm text-gray-600">
                                    <li class="inline-block relative pe-8 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-3 before:-translate-y-1/2 before:size-1 before:bg-gray-300 before:rounded-full dark:text-neutral-400 dark:before:bg-neutral-600">
                                        {{ $order->status }}
                                    </li>
                                    <li class="inline-block relative pe-8 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-3 before:-translate-y-1/2 before:size-1 before:bg-gray-300 before:rounded-full dark:text-neutral-400 dark:before:bg-neutral-600">
                                        {{ $order->payment_method }}
                                    </li>
                                    <li class="inline-block relative pe-8 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-3 before:-translate-y-1/2 before:size-1 before:bg-gray-300 before:rounded-full dark:text-neutral-400 dark:before:bg-neutral-600">
                                        via {{ $order->channel }}
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                @else<!-- empty state -->
                    <div class="max-w-sm w-full flex flex-col justify-center mx-auto px-6 py-4">
                        <div class="flex justify-center items-center size-[46px] bg-slate-100 rounded-lg dark:bg-slate-800">
                            <svg class="shrink-0 size-6 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
                                <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </div>

                        <h2 class="mt-5 font-semibold text-gray-800 dark:text-white">
                            No orders by this customer.
                        </h2>

                        <div class="mt-5 flex flex-col sm:flex-row gap-2">
                            <a href="{{route('vendor.pos')}}" wire:navigate class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm text-white font-medium rounded-lg border border-transparent bg-emerald-500 dark:bg-emerald-600 hover:bg-emerald-700 dark:hover:bg-emerald-800 focus:outline-none focus:bg-emerald-700 dark:focus:bg-emerald-800 disabled:opacity-50 disabled:pointer-events-none">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                Go to Checkout
                            </a>
                        </div>
                    </div>
                    <!-- End empty state -->
                @endif
            @endif
        </div>
    </x-modal>

    <!-- Scripts -->
    @script
    <script>
        Livewire.on('customer-saved', () => {
            Swal.fire({title:'Customer Created!', text:'Customer details have been saved successfully.', icon:'success'});
        })
    </script>
    @endscript
</div>
