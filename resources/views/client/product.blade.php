@extends('layouts.client.site', ['page_title' => 'Product'])
@section('content')
    <!--wrapper start here-->
    <div class="wrapper">
        <section class="product-main-section">
            <div class="container">
                <div class="row pdp-summery-row">
                    <div class="col-lg-6 col-md-12 col-12 pdp-left-side">
                        <div class="mobile-only">
                            <a href="{{ route('client.productList', $category_id) }}" class="back-btn">
                                <span class="svg-ic">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z"
                                            fill="white"></path>
                                    </svg>
                                </span>
                                Back to Categories
                            </a>
                        </div>
                        <div class="pdp-sliders-wrapper">
                            <div class="pdp-main-slider">
                                <div class="pdp-main-itm">
                                    <div class="pdp-main-media">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->title }}">
                                    </div>
                                </div>
                                @foreach ($product_images as $product_image)
                                <div class="pdp-main-itm">
                                    <div class="pdp-main-media">
                                        <img src="{{ $product_image->image_url }}" alt="{{ $product->title }}">
                                    </div>
                                </div> 
                                @endforeach
                            </div>
                            <div class="pdp-thumb-slider">
                                <div class="pdp-main-itm">
                                    <div class="pdp-thumb-media">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->title }}">
                                    </div>
                                </div> 
                                @foreach ($product_images as $product_image)
                                <div class="pdp-main-itm">
                                    <div class="pdp-thumb-media">
                                        <img src="{{ $product_image->image_url }}" alt="{{ $product->title }}">
                                    </div>
                                </div> 
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-xl-5 col-12 pdp-right-side">
                        <div class="pdp-summery">
                            <div class="pdp-top d-flex align-items-center justify-content-between">
                                <a href="{{ route('client.productList', $category_id) }}" class="back-btn desk-only">
                                    <span class="svg-ic">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5"
                                            fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z"
                                                fill="white"></path>
                                        </svg>
                                    </span>
                                    Back to Categories
                                </a>
                                <a class="btn wish-btn" onclick="manipulateWishList('{{ $product->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.18991 3.10164C8.89678 3.37992 8.43395 3.37992 8.14082 3.10164L7.61627 2.60366C7.00231 2.0208 6.17289 1.66491 5.25627 1.66491C3.37348 1.66491 1.84718 3.17483 1.84718 5.03741C1.84718 6.82306 2.82429 8.29753 4.23488 9.50902C5.64667 10.7215 7.33461 11.5257 8.34313 11.9361C8.554 12.0219 8.77673 12.0219 8.9876 11.9361C9.99612 11.5257 11.6841 10.7215 13.0959 9.50901C14.5064 8.29753 15.4835 6.82305 15.4835 5.03741C15.4835 3.17483 13.9572 1.66491 12.0745 1.66491C11.1578 1.66491 10.3284 2.0208 9.71446 2.60366L9.18991 3.10164ZM8.66537 1.52219C7.7806 0.682237 6.57937 0.166016 5.25627 0.166016C2.53669 0.166016 0.332031 2.34701 0.332031 5.03741C0.332031 9.81007 5.61259 12.4457 7.76672 13.3223C8.34685 13.5584 8.98388 13.5584 9.56401 13.3223C11.7181 12.4457 16.9987 9.81006 16.9987 5.03741C16.9987 2.34701 14.794 0.166016 12.0745 0.166016C10.7514 0.166016 9.55013 0.682237 8.66537 1.52219Z" fill="white"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="section-title">
                                <div class="cat-review-wrap d-flex align-items-center">
                                    <div class="category-lbl">{{ $product->categories[0]->category->title}}</div>
                                    {{-- <div class="reviews-stars-wrap d-flex align-items-center">
                                        <div class="reviews-stars-outer">
                                            <img src="/assets/client/images/stars.png" alt="">
                                        </div>
                                        <div class="point-wrap">
                                            <span class="review-point"><span class="points">4.5 /
                                                </span> 5.0</span>
                                        </div>
                                    </div> --}}
                                </div>
                                <h2>{{ $product->title }}</h2>
                            </div>
                            <p>{{ $product->description }}</p>
                            @if ($product->quantity > 0)
                            <div class="price-cart d-flex align-items-center">
                                <a href="#" class="link-btn" onclick="addToCart('{{ $product->id }}', '{{ $product->image_url }}', '{{ $product->title }}', '{{ $product->price }}', '{{ $product->price }}')">Add to cart</a>
                                <div class="price">
                                    <ins>{{ $product->price }} <span class="currency-type">{{ env('CURRENCY') }}</span></ins>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.client.best-sellers-by-category', ['categories' => $categories])
        @include('layouts.client.best-sellers', ['categories' => $categories])
    </div>
    <!---wrapper end here-->

@endsection