<section class="bestseller-section-second padding-bottom">
    <div class="container">
        <div class="padding-bottom">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="bestseller-left-side">
                        <div class="section-title">
                            <h2>Bestsellers</h2>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is
                            simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply
                            dummy text of the printing and typesetting industry. </p>
                        <a href="#" class="btn round-btn">Shop Now</a>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="row row-gap">
                        @if ($categories->isNotEmpty())
                            @foreach ($categories->take(2) as $category)
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 category-card style-two">
                                    <div class="category-card-inner">
                                        <div class="category-img">
                                            <a href="{{ route('client.productList', $category->id) }}">
                                                <img src="{{ $category->image_url }}" alt="{{ $category->title }}">
                                                <div class="badge-count">{{ count($category->products) }}</div>
                                            </a>
                                        </div>
                                        <div class="category-content">
                                            <div class="category-top-content">
                                                <h4>
                                                    <a href="{{ route('client.productList', $category->id) }}">
                                                        {{ $category->title }}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="category-bottom-content">
                                                <a href="{{ route('client.productList', $category->id) }}" class="link-btn">Show products ({{ count($category->products) }})</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>