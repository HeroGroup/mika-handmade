@extends('layouts.client.site', ['page_title' => 'Order'])
@section('content')
    @php
        $address = $order->shipping_address_snapshot ?? [];
        $payment = $order->payment->first();
        $subtotal = $order->items->sum(fn ($item) => (float) $item->subtotal);
    @endphp

    <div class="wrapper">
        <section class="order-summery-page padding-bottom padding-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-12">
                        <div class="section-title d-flex align-items-center justify-content-between">
                            <h2>Order #{{ $order->id }} History</h2>
                            <div class="dated">
                                <b>Date Added:</b>
                                {{ $order->created_at?->format('d M, Y') }}
                            </div>
                        </div>

                        <div class="order-confirmation">
                            <h4>Order Items</h4>
                            <div class="order-confirmation-body">
                                <table class="order-history-tbl">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->items as $item)
                                            <tr>
                                                <td data-label="Product">
                                                    @if ($item->product)
                                                        <a href="{{ route('client.product', $item->product_id) }}" class="pro-img-cart">
                                                            <img src="{{ $item->product->image_url }}" alt="{{ $item->title }}">
                                                        </a>
                                                    @endif
                                                </td>
                                                <td data-label="Name">
                                                    {{ $item->title }}
                                                    @if ($item->productAttribute?->attributeValue)
                                                        <div class="product-option">
                                                            {{ $item->productAttribute->attributeValue->value }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td data-label="Quantity">{{ $item->quantity }}</td>
                                                <td data-label="Price">
                                                    {{ number_format((float) $item->unit_price, 2) }} {{ env('CURRENCY') }}
                                                </td>
                                                <td data-label="Total">
                                                    {{ number_format((float) $item->subtotal, 2) }} {{ env('CURRENCY') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="order-payment-box">
                                    <div class="order-paymentcol">
                                        <div class="order-paycol-inner">
                                            <p>Payment method:</p>
                                            <strong>{{ $payment?->method?->value ?? 'Not available' }}</strong>
                                        </div>
                                    </div>
                                    <div class="order-paymentcol">
                                        <div class="order-paycol-inner">
                                            <p>Payment status:</p>
                                            <strong>{{ ucfirst($order->payment_status->value) }}</strong>
                                        </div>
                                    </div>
                                    <div class="order-paymentcol">
                                        <div class="order-paycol-inner">
                                            <div class="d-flex align-items-center justify-content-between payment-ttl-row">
                                                <div class="payment-ttl-left">
                                                    <span>Sub-total: <b>{{ number_format($subtotal, 2) }} {{ env('CURRENCY') }}</b></span>
                                                    <span>Discount: <b>{{ number_format((float) $order->discount_amount, 2) }} {{ env('CURRENCY') }}</b></span>
                                                </div>
                                                <div class="payment-ttl-left">
                                                    <h5>Total:</h5>
                                                    <div class="ttl-pric">{{ number_format((float) $order->total_amount, 2) }} {{ env('CURRENCY') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 col-12">
                        <div class="order-confirmation">
                            <h4>Order informations</h4>
                            <div class="order-confirmation-body">
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="order-confirm-details">
                                            <h5>Billing informations:</h5>
                                            <p>{{ $address['first_name'] ?? '' }} {{ $address['last_name'] ?? '' }}<br>
                                                {{ $address['address_1'] ?? '' }}<br>
                                                {{ $address['city'] ?? '' }} {{ $address['post_code'] ?? '' }}<br>
                                                {{ $address['state'] ?? '' }}, {{ $address['country'] ?? '' }}</p>
                                            <div class="link"><a href="tel:{{ $order->user->phone }}">Phone: {{ $order->user->phone }}</a></div>
                                            <div class="link"><a href="mailto:{{ $order->user->email }}">Email: {{ $order->user->email }}</a></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="order-confirm-details">
                                            <h5>Delivery informations:</h5>
                                            <p>{{ $address['first_name'] ?? '' }} {{ $address['last_name'] ?? '' }}<br>
                                                {{ $address['address_1'] ?? '' }}<br>
                                                {{ $address['city'] ?? '' }} {{ $address['post_code'] ?? '' }}<br>
                                                {{ $address['state'] ?? '' }}, {{ $address['country'] ?? '' }}</p>
                                            <div class="link"><a href="tel:{{ $order->user->phone }}">Phone: {{ $order->user->phone }}</a></div>
                                            <div class="link"><a href="mailto:{{ $order->user->email }}">Email: {{ $order->user->email }}</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
