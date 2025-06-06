<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <link rel="stylesheet" href="{{ asset('assets/pdf.css') }}" type="text/css">
</head>
<body class="font-serif">
<div class="">
    <div>
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <img src="{{ asset('assets/dukatools-logo-black-transparent.png') }}" alt="dukatools" width="200" />
                </td>
                <td class="w-half">
                    <h2>Customer Receipt</h2>
                </td>
            </tr>
        </table>

        <div class="margin-top">
            <table class="w-full">
                <tr>
                    <td class="w-half">
                        <div><h4>To:</h4></div>
                        <div>John Doe</div>
                        <div>123 Acme Str.</div>
                    </td>
                    <td class="w-half">
                        <div><h4>From:</h4></div>
                        <div>Laravel Daily</div>
                        <div>London</div>
                    </td>
                </tr>
                <tr>
                    <td class="w-full">
                        <div><h4>Order ID:</h4></div>
                        <div>{{ $order->id }}</div>
                        <div>{{ $order->created_at->format('F j, Y') }}</div>
                    </td>
                </tr>
                <tr>
                    <td class="w-full">
                        <div><h4>Total:</h4></div>
                        <div>{{ config('app.currency_symbol') }} {{ number_format($order->total, 2) }}</div>
                        <div>Paid via {{ $order->payment_method }}</div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="margin-top">
            <table class="products">
                <tr>
                    <th>Qty</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
                <tr class="items">
                    @forelse($order->orderItems as $item)
                        <td>
                            {{ $item->quantity }}
                        </td>
                        <td>
                            {{ $item->product->name }}
                        </td>
                        <td>
                            {{ $item->sub_total }}
                        </td>
                    @empty
                        <tr>
                            <td colspan="3">No items found</td>
                        </tr>
                    @endforelse
                </tr>
            </table>
        </div>

        <div class="total">
            Total: {{ config('app.currency_symbol') }} {{ number_format($order->total, 2) }} {{ config('app.currency_code') }}
        </div>

        <div class="footer margin-top">
            <div>Thank you</div>
            <div>&copy; Laravel Daily</div>
        </div>
    </div>
</div>
</body>
</html>
