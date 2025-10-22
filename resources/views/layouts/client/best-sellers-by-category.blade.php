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
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 category-card style-two">
                            <div class="category-card-inner">
                                <div class="category-img">
                                    <a href="{{ route('client.productList', $categories[0]->id) }}">
                                        <img src="{{ $categories[0]->image_url }}" alt="">
                                        <div class="badge-count">{{ count($categories[0]->products) }}</div>
                                    </a>
                                </div>
                                <div class="category-content">
                                    <div class="category-top-content">
                                        <h4>
                                            <a href="{{ route('client.productList', $categories[0]->id) }}">
                                                {{ $categories[0]->title }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="category-bottom-content">
                                        <a href="{{ route('client.productList', $categories[0]->id) }}" class="link-btn">Show products ({{ count($categories[0]->products) }})</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 category-card style-two">
                            <div class="category-card-inner">
                                <div class="category-img">
                                    <a href="{{ route('client.productList', $categories[1]->id) }}">
                                        <img src="{{ $categories[1]->image_url }}" alt="{{ $categories[1]->title }}">
                                        <div class="badge-count">{{ count($categories[1]->products) }}</div>
                                    </a>
                                </div>
                                <div class="category-content">
                                    <div class="category-top-content">
                                        <h4><a href="{{ route('client.productList', $categories[1]->id) }}">
                                                {{ $categories[1]->title }}
                                            </a></h4>
                                    </div>
                                    <div class="category-bottom-content">
                                        <a href="{{ route('client.productList', $categories[1]->id) }}" class="link-btn">Show products ({{ count($categories[1]->products) }})</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>