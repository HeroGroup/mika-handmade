<div class="product-card">
    <div class="product-card-inner">
    <div class="product-img">
        <a href="{{ route('client.product', $id) }}">
            <img src="{{ $product->image_url }}" alt="{{ $product->title }}">
        </a>
    </div>
    <div class="product-content">
        <div class="product-content-top">
            <div
                class="top-subtitle d-flex align-items-center justify-content-between">
                <div class="subtitle">{{ $category->title }}</div>
            </div>
            {{-- <div class="reviews-stars-wrap d-flex align-items-center">
                <div class="reviews-stars-outer">
                    <img src="/assets/client/images/stars.png" alt="">
                </div>
                <div class="point-wrap">
                    <span class="review-point"><span class="points">4.5 / </span> 5.0</span>
                </div>
            </div> --}}
            <h4><a href="{{ route('client.product', $id) }}">{{ $product->title }}</a></h4>
        </div>
        <div class="product-content-center">
            <p>{{ $product->description }}</p>
            <div class="price">
                <ins>{{ $product->price }} <span class="currency-type">{{ env('CURRENCY') }}</span></ins>
            </div>
            <a onclick="addToCart('{{ $id }}', '{{ $product->image_url }}', '{{ $product->title }}', '{{ $product->price }}', '{{ $product->price }}')" class="link-btn">Add to cart</a>
            {{ $wishListed = \App\Models\WishList::where('user_id', auth()->user()?->id)->where('product_id', $product->id)->first(); }}
            <a class="wish-btn" tabindex="0" onclick="manipulateWishList('{{ $id }}')">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10"
                    viewBox="0 0 12 10" fill="none">
                    <path id="product-wishable-{{ $product->id }}" @if($wishListed) fill-rule="nonezero" @else fill-rule="evenodd" @endif clip-rule="evenodd"
                        d="M6.37767 2.11365C6.16662 2.31401 5.83338 2.31401 5.62233 2.11365L5.24466 1.75511C4.8026 1.33544 4.20542 1.0792 3.54545 1.0792C2.18985 1.0792 1.09091 2.16634 1.09091 3.5074C1.09091 4.79307 1.79443 5.85469 2.81005 6.72696C3.82654 7.59997 5.04185 8.17897 5.76799 8.47446C5.91982 8.53625 6.08018 8.53625 6.23201 8.47446C6.95814 8.17897 8.17346 7.59997 9.18995 6.72696C10.2056 5.85469 10.9091 4.79307 10.9091 3.5074C10.9091 2.16634 9.81015 1.0792 8.45455 1.0792C7.79458 1.0792 7.1974 1.33544 6.75535 1.75511L6.37767 2.11365ZM6 0.976447C5.36297 0.371679 4.49809 0 3.54545 0C1.58735 0 0 1.57032 0 3.5074C0 6.94372 3.80201 8.84136 5.35298 9.47252C5.77067 9.6425 6.22933 9.64249 6.64702 9.47252C8.198 8.84136 12 6.94371 12 3.5074C12 1.57032 10.4126 0 8.45455 0C7.50191 0 6.63703 0.371679 6 0.976447Z" fill="white"></path>
                </svg>
            </a>
        </div>
    </div>
    </div>
</div>