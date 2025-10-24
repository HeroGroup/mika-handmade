@extends('layouts.client.site', ['page_title' => 'Products'])
@section('content')
    <!--wrapper start here-->
    <div class="wrapper">
        <section class="common-banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12"> 
                        <div class="common-banner-content">
                            <div class="section-title">
                                <h2>{{ $category->title }}<span>({{ count($category->products) }})</span></h2>
                            </div>
                            <p>{{ $category->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
        <section class="product-listing-section padding-bottom"> 
            <div class="product-heading-row">
                <div class="container">
                    <div class=" row no-gutters">
                        <div class="product-heading-column col-lg-3 col-md-4 col-1">
                            <div class="filter-title">
                                <h4>Filters</h4>
                                <div class="filter-ic">
                                    <svg class="icon icon-filter" aria-hidden="true" focusable="false" role="presentation" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                        <path fill-rule="evenodd" d="M4.833 6.5a1.667 1.667 0 1 1 3.334 0 1.667 1.667 0 0 1-3.334 0ZM4.05 7H2.5a.5.5 0 0 1 0-1h1.55a2.5 2.5 0 0 1 4.9 0h8.55a.5.5 0 0 1 0 1H8.95a2.5 2.5 0 0 1-4.9 0Zm11.117 6.5a1.667 1.667 0 1 0-3.334 0 1.667 1.667 0 0 0 3.334 0ZM13.5 11a2.5 2.5 0 0 1 2.45 2h1.55a.5.5 0 0 1 0 1h-1.55a2.5 2.5 0 0 1-4.9 0H2.5a.5.5 0 0 1 0-1h8.55a2.5 2.5 0 0 1 2.45-2Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </div> 
                        </div>
                        <div class="product-heading-right-column col-lg-9 col-md-8 col-11">
                            <div class="product-sorting-row d-flex align-items-center justify-content-between">
                                <ul class="produdt-filter-cat d-flex align-items-center">
                                    <li><a href="#">{{ $category->main_category?->title }}</a></li>
                                    <li><a href="#">{{ $category->title }}</a></li>
                                </ul>
                                <div class="filter-select-box d-flex align-items-center justify-content-end">
                                    <span class="sort-lbl">Sort by:</span>
                                    <select>
                                        <option value="manual">Featured</option>
                                        <option value="best-selling" selected="selected">Best selling</option>
                                        <option value="title-ascending">Alphabetically, A-Z</option>
                                        <option value="title-descending">Alphabetically, Z-A</option>
                                        <option value="price-ascending">Price, low to high</option>
                                        <option value="price-descending">Price, high to low</option>
                                        <option value="created-ascending">Date, old to new</option>
                                        <option value="created-descending">Date, new to old</option>
                                    </select>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="product-list-row row no-gutters">
                    <div class="product-filter-column col-lg-3 col-md-4 col-12"> 
                        <div class="product-filter-body">
                            <div class="mobile-only close-filter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                                    <path  d="M27.7618 25.0008L49.4275 3.33503C50.1903 2.57224 50.1903 1.33552 49.4275 0.572826C48.6647 -0.189868 47.428 -0.189965 46.6653 0.572826L24.9995 22.2386L3.33381 0.572826C2.57102 -0.189965 1.3343 -0.189965 0.571605 0.572826C-0.191089 1.33562 -0.191186 2.57233 0.571605 3.33503L22.2373 25.0007L0.571605 46.6665C-0.191186 47.4293 -0.191186 48.666 0.571605 49.4287C0.952952 49.81 1.45285 50.0007 1.95275 50.0007C2.45266 50.0007 2.95246 49.81 3.3339 49.4287L24.9995 27.763L46.6652 49.4287C47.0465 49.81 47.5464 50.0007 48.0463 50.0007C48.5462 50.0007 49.046 49.81 49.4275 49.4287C50.1903 48.6659 50.1903 47.4292 49.4275 46.6665L27.7618 25.0008Z" fill="white"></path>
                                </svg>
                            </div>
                            <div class="product-widget product-cat-widget"> 
                                <div class="pro-itm has-children">
                                    <a href="javascript:;" class="acnav-label">
                                        products 
                                    </a>
                                    <ul class="pro-itm-inner acnav-list">
                                        <li class="filter-listing">
                                            <ul>
                                                <li class="has-children">
                                                    <a href="javascript:;" class="acnav-label">new</a>
                                                    <ul class="acnav-list">
                                                        <li>
                                                            <a href="#">Fedoras</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Flat Caps</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Straws</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Cold Weather</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Baseball</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Hat Care</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Facemasks</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Gift Cards</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="has-children">
                                                    <a href="javascript:;" class="acnav-label">Accessories </a>
                                                    <ul class="acnav-list">
                                                        <li>
                                                            <a href="#">Fedoras</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Flat Caps</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Straws</a>
                                                        </li>
                                                    </ul>   
                                                </li>
                                                <li class="has-children">
                                                    <a href="javascript:;" class="acnav-label"> Sets</a>
                                                    <ul class="acnav-list">
                                                        <li>
                                                            <a href="#">Fedoras</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Flat Caps</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Straws</a>
                                                        </li>
                                                    </ul>   
                                                </li> 
                                            </ul>
                                        </li> 
                                    </ul>
                                </div> 
                            </div>
                            <div class="product-widget product-tag-widget"> 
                                <div class="pro-itm has-children">
                                    <a href="javascript:;" class="acnav-label">
                                        tags 
                                    </a>
                                    <div class="pro-itm-inner acnav-list">
                                        <div class="d-flex flex-wrap text-checkbox">
                                            <div class="checkbox">
                                                <input id="checkbox-1" name="radio" type="checkbox" value=".blue">
                                                <label for="checkbox-1" class="checkbox-label">Accessories</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="checkbox-2" name="radio" type="checkbox" value=".blue">
                                                <label for="checkbox-2" class="checkbox-label">Glasses</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="checkbox-3" name="radio" type="checkbox" value=".blue">
                                                <label for="checkbox-3" class="checkbox-label">Glasses</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="checkbox-4" name="radio" type="checkbox" value=".blue">
                                                <label for="checkbox-4" class="checkbox-label">Glasses</label>
                                            </div>
                                        </div>
                                        <div class="delete-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.43285 1.01177C6.59919 0.845434 6.86887 0.845434 7.03521 1.01177C7.20154 1.1781 7.20154 1.44779 7.03521 1.61412L4.62579 4.02354L7.03521 6.43295C7.20154 6.59929 7.20154 6.86897 7.03521 7.03531C6.86887 7.20164 6.59919 7.20164 6.43285 7.03531L4.02344 4.62589L1.61402 7.03531C1.44769 7.20164 1.178 7.20164 1.01167 7.03531C0.845333 6.86897 0.845333 6.59929 1.01167 6.43295L3.42108 4.02354L1.01167 1.61412C0.845333 1.44779 0.845332 1.17811 1.01167 1.01177C1.178 0.845434 1.44769 0.845434 1.61402 1.01177L4.02344 3.42119L6.43285 1.01177Z" fill="#183A40"/>
                                            </svg>
                                            Delete all
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="product-widget product-price-widget"> 
                                <div class="pro-itm has-children">
                                    <a href="javascript:;" class="acnav-label">
                                        price 
                                    </a>
                                    <div class="pro-itm-inner acnav-list">
                                        <div class="price-select d-flex">
                                            <div class="select-col">
                                                <p>min price:</p>
                                                <select>
                                                    <option value="$ 100">$ 100</option>
                                                    <option value="$ 200">$ 200</option>
                                                    <option value="$ 300">$ 300</option>
                                                    <option value="$ 400">$ 400</option>
                                                </select>
                                            </div>
                                            <div class="select-col">
                                                <p>max price:</p>
                                                <select>
                                                    <option value="$ 500">$ 500</option>
                                                    <option value="$ 600">$ 600</option>
                                                    <option value="$ 700">$ 700</option>
                                                    <option value="$ 800">$ 800</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="range-slider">
                                            <div id="slider-range"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-widget product-colors-widget">
                                <div class="pro-itm has-children">
                                    <a href="javascript:;" class="acnav-label">
                                        Colors 
                                    </a>
                                    <div class="pro-itm-inner acnav-list">
                                        <div class="colors-checkbox"> 
                                            <label class="check-label" for="color1">
                                                <span class="custom-checkbox">
                                                    <input id="color1"   type="checkbox">
                                                    <span class="color" style="background-color:#CFC4A6;"></span>
                                                </span> 
                                                <div class="color-name">
                                                    Taupe 
                                                    <span class="color-count">(1)</span> 
                                                </div>
                                            </label> 
                                        </div>
                                        <div class="colors-checkbox"> 
                                            <label class="check-label" for="color2">
                                                <span class="custom-checkbox">
                                                    <input id="color2"   type="checkbox">
                                                    <span class="color" style="background-color:#f5f5dc;"></span>
                                                </span> 
                                                <div class="color-name">
                                                    Beige
                                                    <span class="color-count">(1)</span> 
                                                </div>
                                            </label> 
                                        </div>
                                        <div class="colors-checkbox"> 
                                            <label class="check-label" for="color3">
                                                <span class="custom-checkbox">
                                                    <input id="color3"   type="checkbox">
                                                    <span class="color" style="background-color:#faebd7;"></span>
                                                </span> 
                                                <div class="color-name">
                                                    Off White
                                                    <span class="color-count">(4)</span> 
                                                </div>
                                            </label> 
                                        </div>
                                        <div class="colors-checkbox"> 
                                            <label class="check-label" for="color4">
                                                <span class="custom-checkbox">
                                                    <input id="color4"   type="checkbox">
                                                    <span class="color" style="background-color:#E84C3D;"></span>
                                                </span> 
                                                <div class="color-name">
                                                    Red
                                                    <span class="color-count">(15)</span> 
                                                </div>
                                            </label> 
                                        </div>
                                        <div class="colors-checkbox"> 
                                            <label class="check-label" for="color5">
                                                <span class="custom-checkbox">
                                                    <input id="color5"   type="checkbox">
                                                    <span class="color" style="background-color:#F39C11;"></span>
                                                </span> 
                                                <div class="color-name">
                                                    Orange 
                                                    <span class="color-count">(10)</span> 
                                                </div>
                                            </label> 
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-filter-right-column col-lg-9 col-md-8 col-12">
                        <div class="row">
                            @foreach ($category->products as $productCategory)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                @include('layouts.client.product', [
                                    'id' => $productCategory->product_id,
                                    'product' => $productCategory->product,
                                    'category' => $category
                                ])
                            </div>                                
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>   
        
        @include('layouts.client.best-sellers', ['categories' => $categories])
    </div>
    <!---wrapper end here-->
@endsection