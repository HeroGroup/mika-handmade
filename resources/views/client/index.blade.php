@extends('layouts.client.site', ['page_title' => 'Home'])
@section('content')
<!--wrapper start here-->
    <div class="wrapper">
        <section class="main-home-first-section padding-top padding-bottom">
            <div class="container">
                <div class="section-title d-flex align-items-center justify-content-between">
                    <div class="section-title-left">
                        <h2>{{ $top_page_category->title }}</h2>
                    </div>
                    <div class="section-title-right">
                        <a href="{{ route('client.productList', $top_page_category->id) }}" class="btn round-btn">Shop Now</a>
                        <div class="section-desk">
                            <p>{{ $top_page_category->description }}</p>
                        </div>
                    </div>
                </div>
                <?php $inner_categories = $top_page_category->categories; ?>
                <div class="section-border-bottom padding-bottom">
                    <div class="row row-gap">
                        @foreach ($inner_categories as $inner_category)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 category-card">
                            <div class="category-card-inner">
                                <div class="new-lbl">{{ $inner_category->title }}</div>
                                <div class="category-img">
                                    <a href="{{ route('client.productList', $inner_category->id) }}">
                                        <img src="{{ $inner_category->image_url }}" alt="{{ $inner_category->title }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="latest-products-section padding-bottom">
            <div class="container">
                <div class="section-title d-flex align-items-center justify-content-between">
                    <div class="section-title-left">
                        <h2>New <br>Products</h2>
                    </div>
                    <div class="section-title-right">
                        <a href="#" class="btn round-btn small-round">Show <br>More</a>
                    </div>
                </div>
                <div class="tabs-wrapper section-border-bottom padding-bottom">
                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="tab-nav">
                                <ul class="tabs">
                                    @foreach ($categories as $key => $category)
                                        <li class="tab-link @if ($key===0) active @endif" data-tab="category-{{ $category->id }}"><a href="javascript:;">{{ $category->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-12 tabs-container">
                            @foreach ($categories as $key => $category)
                            <div class="tab-content @if ($key===0) active @endif" id="category-{{ $category->id }}">
                                <div class="shop-protab-slider product-row">
                                    @foreach ($category->products as $product)
                                    <div class="product-card">
                                        @include('layouts.client.product', [
                                            'id' => $product->product_id,
                                            'product' => $product->product,
                                            'category' => $category
                                        ])
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.client.best-sellers', ['categories' => $categories])
        @include('layouts.client.best-sellers-by-category', ['categories' => $categories])
    </div>
    <!---wrapper end here-->
@endsection