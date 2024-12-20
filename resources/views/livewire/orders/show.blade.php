<div>
    <div class="text-slate-800 dark:text-slate-200">
        <div class="py-5">
            <h3 class="font-extrabold text-xl lg:text-2xl">Order Summary: (#{{ $order->reference }})</h3>
        </div>

        <div class="grid md:grid-cols-2 gap-6 items-center px-5 py-4 mt-3 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-800 rounded-lg">
            <div class="grid space-y-1 text-sm">
                <h4 class="text-base font-bold pb-1.5">Order Balances</h4>

                <div class="flex md:flex-row gap-x-1.5">
                    <p class="font-semibold text-amber-800 dark:text-amber-500 min-w-32">Order Number: </p>
                    <p class="">
                       #{{ $order->reference }}
                    </p>
                </div>

                <div class="flex flex-row gap-x-1.5">
                    <p class="font-semibold text-amber-800 dark:text-amber-500 min-w-32">Status: </p>
                    <p class="text-slate-700 dark:text-slate-300">{{ $order->status }}</p>
                </div>

                <div class="flex flex-row gap-x-1.5">
                    <p class="font-semibold text-amber-800 dark:text-amber-500 min-w-32">Total: </p>
                    <p>{{ config('app.currency_symbol') . ' ' . number_format($order->total, 2) }}</p>
                </div>

                <div class="flex flex-row gap-x-1.5">
                    <p class="font-semibold text-amber-800 dark:text-amber-500 min-w-32">Tax: </p>
                    <p>{{ config('app.currency_symbol') . ' ' . number_format($order->tax, 2) }}</p>
                </div>

                <div class="flex flex-row gap-x-1.5">
                    <p class="font-semibold text-amber-800 dark:text-amber-500 min-w-32">Shipping fee: </p>
                    <p>{{ config('app.currency_symbol') . ' ' . number_format($order->shipping_fee, 2) }}</p>
                </div>

                <div class="flex flex-row gap-x-1.5">
                    <p class="font-semibold text-amber-800 dark:text-amber-500 min-w-32">Date: </p>
                    <p>{{ $order->created_at->format('F j, Y') }}</p>
                </div>
            </div>

            <div class="text-sm">
                <h4 class="text-base font-bold pb-1.5">Order Processing</h4>
                <div class="space-y-1 text-sm">
                    <p class="text-slate-500 dark:text-slate-500">Payment Details:</p>
                    @if($order->is_paid)
                        <span class="text-green-600 dark:text-green-500 ">Paid with {{ $order->payment_method ?? '' }}</span>
                    @else
                        <span class="text-red-600 dark:text-red-500 uppercase">Not Paid</span>
                    @endif
                    <p class="">
                        Sold at <span class="text-xs font-medium text-slate-600 dark:text-slate-400">{{ $order->channel ?? 'N/A'}}</span>
                    </p>
                </div>

                <div class="mt-2 space-y-1 text-xs md:text-sm xl:text-base">
                    <p class="font-semibold text-sm lg:text-base text-amber-800 dark:text-amber-500">Customer Details </p>
                    <p class="leading-tight italic">{{ $order->customer_name }}</p>
                    <p class="leading-tight italic">{{ $order->customer_email }}</p>
                    <p class="leading-tight italic">{{ $order->customer_phone }}</p>
                </div>
            </div>

            <div class="mt-5 text-sm md:col-span-2">
                <h4 class="font-medium">Order Notes:</h4>
                <p class="italic">{{$order->notes}}</p>
            </div>
        </div>

        <div class="my-4 md:my-6 md:px-5 px-3 py-4">

            <div class="grid space-y-2.5 text-slate-600 dark:text-slate-400">
                <h3 class="py-2 font-bold text-lg">Order Items</h3>

                @foreach($order->orderItems as $item)
                    <x-cards.order-item :item="$item" :isOrder="true" />
                @endforeach
            </div>
        </div>

        <!--payment buttons-->
        @if(!$order->is_paid)
            <div class="hidden my-12 grid justify-end">
                <div class="mt-5 mx-auto place-content-center">
                    <a href="{{ route('orders.checkout', $order->id) }}" class="px-4 py-2 bg-green-500 text-white rounded-lg"
                    >Complete Payments</a>
                </div>
            </div>
        @endif

        <a href="{{route('vendor.sales')}}"
           class="w-fit mt-4 p-3 md:px-5 flex bg-slate-200 hover:bg-slate-300 text-blue-600 rounded-lg">
            <p class="pr-2 font-semibold">Go Back</p>
            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>back_2_fill</title> <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Arrow" transform="translate(-480.000000, -50.000000)" fill-rule="nonzero"> <g id="back_2_fill" transform="translate(480.000000, 50.000000)"> <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path> <path d="M7.16075,10.9724 C8.44534,9.45943 10.3615,8.5 12.5,8.5 C16.366,8.5 19.5,11.634 19.5,15.5 C19.5,16.3284 20.1715,17 21,17 C21.8284,17 22.5,16.3284 22.5,15.5 C22.5,9.97715 18.0228,5.5 12.5,5.5 C9.55608,5.5 6.91086,6.77161 5.08155,8.79452 L4.73527,6.83068 C4.59142,6.01484 3.81343,5.47009 2.99759,5.61394 C2.18175,5.7578 1.637,6.53578 1.78085,7.35163 L2.82274,13.2605 C2.89182,13.6523 3.11371,14.0005 3.43959,14.2287 C3.84283,14.5111 4.37354,14.5736 4.82528,14.4305 L10.4693,13.4353 C11.2851,13.2915 11.8299,12.5135 11.686,11.6976 C11.5422,10.8818 10.7642,10.337 9.94833,10.4809 L7.16075,10.9724 Z" id="路径" fill="#2563eb"> </path> </g> </g> </g> </g></svg>
        </a>
    </div>
</div>
