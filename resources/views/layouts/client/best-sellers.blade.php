<section class="bestseller-section padding-bottom">
    <div class="container">
        <div class="section-title d-flex align-items-center justify-content-between">
            <div class="section-title-left">
                <h2>Bestsellers</h2>
            </div>
            <div class="section-title-right">
                <a href="#" class="btn round-btn small-round">Show <br>More</a>
            </div>
        </div>
        <div class="tabs-wrapper section-border-bottom padding-bottom">
            <div class="tab-nav">
                <ul class="tabs d-flex">
                    @foreach ($categories as $key => $category)
                        <li class="tab-link @if($key===0) active @endif" data-tab="category-{{ $category->id }}"><a href="javascript:;">{{ $category->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="tabs-container">
                @foreach ($categories as $key => $category)
                <div class="tab-content @if($key===0) active @endif" id="category-{{ $category->id }}">
                    <div class="bestseller-slider product-row">
                        @foreach ($category->products as $product)
                            @include('layouts.client.product', [
                                'id' => $product->product_id,
                                'product' => $product->product,
                                'category' => $category
                            ])
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>