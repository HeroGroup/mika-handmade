@extends('layouts.client.site', ['page_title' => 'Wish List'])
@section('content')
    <div class="wrapper">
        <div class="section-title">
            <h2>Wish list<span class="wishcount"></span></h2>
        </div> 
        <div class="order-confirmation-body"> 
            <table class="order-history-tbl"> 
                <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th> 
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($wishList as $item)
                    <tr>
                        <td data-label="Product">
                            <a href="{{ route('client.product', $item->product_id) }}" class="pro-img-cart">
                                <img src="{{ $item->product->image_url }}" alt="{{ $item->product->title }}">
                            </a>
                        </td> 
                        <td data-label="Name">
                            <a href="/product">{{ $item->product->title }}</a>
                            {{-- <div class="product-option">
                                <dt>Size: </dt>
                                <dd>S</dd>
                            </div> --}}
                        </td>
                        <td data-label="Price"> 
                            {{ $item->product->price }} {{ env('CURRENCY') }}
                        </td> 
                        <td data-label="Total">
                            <a href="javascript:;" onclick="addToCart('{{ $item->product->id }}', '{{ $item->product->image_url }}', '{{ $item->product->title }}', '{{ $item->product->price }}', '{{ $item->product->price }}')" class="link-btn">add to cart</a>
                            <a href="javascript:;" class="remove-btn" onclick="manipulateWishList('{{ $item->product->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true" focusable="false" role="presentation" class="icon icon-remove">
                                    <path d="M14 3h-3.53a3.07 3.07 0 00-.6-1.65C9.44.82 8.8.5 8 .5s-1.44.32-1.87.85A3.06 3.06 0 005.53 3H2a.5.5 0 000 1h1.25v10c0 .28.22.5.5.5h8.5a.5.5 0 00.5-.5V4H14a.5.5 0 000-1zM6.91 1.98c.23-.29.58-.48 1.09-.48s.85.19 1.09.48c.2.24.3.6.36 1.02h-2.9c.05-.42.17-.78.36-1.02zm4.84 11.52h-7.5V4h7.5v9.5z" fill="currentColor"></path>
                                    <path d="M6.55 5.25a.5.5 0 00-.5.5v6a.5.5 0 001 0v-6a.5.5 0 00-.5-.5zM9.45 5.25a.5.5 0 00-.5.5v6a.5.5 0 001 0v-6a.5.5 0 00-.5-.5z" fill="currentColor"></path>
                                </svg> 
                            </a>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
@endsection