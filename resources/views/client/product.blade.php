@extends('layouts.client.site', ['page_title' => 'Product'])
@section('content')
    <!--wrapper start here-->
    <div class="wrapper">
        <section class="product-main-section">
            <div class="container">
                <div class="row pdp-summery-row">
                    <div class="col-lg-6 col-md-12 col-12 pdp-left-side">
                        @if ($category_id)
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
                        @endif
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
                                @if ($category_id)
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
                                @endif
                                <a class="btn wish-btn" onclick="manipulateWishList('{{ $product->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.18991 3.10164C8.89678 3.37992 8.43395 3.37992 8.14082 3.10164L7.61627 2.60366C7.00231 2.0208 6.17289 1.66491 5.25627 1.66491C3.37348 1.66491 1.84718 3.17483 1.84718 5.03741C1.84718 6.82306 2.82429 8.29753 4.23488 9.50902C5.64667 10.7215 7.33461 11.5257 8.34313 11.9361C8.554 12.0219 8.77673 12.0219 8.9876 11.9361C9.99612 11.5257 11.6841 10.7215 13.0959 9.50901C14.5064 8.29753 15.4835 6.82305 15.4835 5.03741C15.4835 3.17483 13.9572 1.66491 12.0745 1.66491C11.1578 1.66491 10.3284 2.0208 9.71446 2.60366L9.18991 3.10164ZM8.66537 1.52219C7.7806 0.682237 6.57937 0.166016 5.25627 0.166016C2.53669 0.166016 0.332031 2.34701 0.332031 5.03741C0.332031 9.81007 5.61259 12.4457 7.76672 13.3223C8.34685 13.5584 8.98388 13.5584 9.56401 13.3223C11.7181 12.4457 16.9987 9.81006 16.9987 5.03741C16.9987 2.34701 14.794 0.166016 12.0745 0.166016C10.7514 0.166016 9.55013 0.682237 8.66537 1.52219Z" fill="white"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="section-title">
                                <div class="cat-review-wrap d-flex align-items-center">
                                    @if ($product->categories->isNotEmpty() && $product->categories[0]?->category)
                                        <div class="category-lbl">{{ $product->categories[0]->category->title }}</div>
                                    @endif
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
                            @if ($variantGroups)
                                <div class="variant-selector-wrap" style="margin-bottom: 16px;">
                                    @foreach ($variantGroups as $variantGroup)
                                        <div class="variant-group" style="margin-bottom: 10px;">
                                            <label for="variant-{{ $variantGroup['name'] }}" style="display:block; margin-bottom: 4px; font-weight: 600;">{{ $variantGroup['label'] }}</label>
                                            <select id="variant-{{ $variantGroup['name'] }}" class="variant-select form-control" data-group="{{ $variantGroup['name'] }}" onchange="window.updateVariantSelection && window.updateVariantSelection();">
                                                <option value="">Select {{ $variantGroup['label'] }}</option>
                                                @foreach ($variantGroup['options'] as $option)
                                                    <option value="{{ $option['value'] }}" @if($loop->first) selected @endif>{{ $option['value'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach
                                </div>
                                <div id="variant-select-prompt" class="variant-select-prompt" style="display:none; margin-bottom: 12px; color: #333; font-weight:600;">Select {{ $variantGroups[0]['label'] ?? 'option' }} first</div>
                            @endif
                            <div class="variant-stock-message" style="margin-bottom: 12px; min-height: 24px; color: #61AFB3;"></div>
                            <div class="price-cart d-flex align-items-center">
                                <a href="javascript:void(0);" id="add-to-cart-btn" data-product-id="{{ $product->id }}" class="link-btn" onclick="return addSelectedVariantToCart('{{ $product->id }}', '{{ $product->image_url }}', '{{ $product->title }}')">Add to cart</a>
                                <div class="product-page-cart" style="display:none; align-items:center; gap:6px; margin-left:12px;">
                                    <button id="product-page-decrease-{{ $product->id }}" onclick="(function(){ var sel = getSelectedVariant(); if(sel && sel.id){ changeCartCount('{{ $product->id }}', sel.id, 'dec'); } else { changeCartCount('{{ $product->id }}', null, 'dec'); } })()">-</button>
                                    <span id="product-page-count-{{ $product->id }}" class="product-page-cart-count" data-product-id="{{ $product->id }}" data-product-attribute-id="">0</span>
                                    <button id="product-page-increase-{{ $product->id }}" onclick="addSelectedVariantToCart('{{ $product->id }}', '{{ $product->image_url }}', '{{ $product->title }}')">+</button>
                                </div>
                                <div class="price">
                                    <ins id="variant-price">{{ $product->price }} <span class="currency-type">{{ env('CURRENCY') }}</span></ins>
                                </div>
                            </div>
                            <script>
                                window.productVariants = @json($variantOptions);
                                window.variantLookup = {};
                                window.hasVariantGroups = {{ $variantGroups ? 'true' : 'false' }};

                                function formatVariantPrice(value) {
                                    return new Intl.NumberFormat('en-US', {
                                        minimumFractionDigits: 2,
                                        maximumFractionDigits: 2,
                                    }).format(value);
                                }

                                function buildVariantLookup() {
                                    window.variantLookup = {};

                                    if (!window.productVariants || !window.productVariants.length) {
                                        return;
                                    }

                                    window.productVariants.forEach(function (variant) {
                                        if (!variant || !variant.attributes) {
                                            return;
                                        }

                                        var variantKey = Object.keys(variant.attributes).sort().map(function (key) {
                                            return key + ':' + variant.attributes[key];
                                        }).join('|');

                                        window.variantLookup[variantKey] = variant;
                                    });
                                }

                                function getSelectedVariant() {
                                    var selects = Array.from(document.querySelectorAll('.variant-select'));
                                    var selectedPairs = selects
                                        .filter(function (select) {
                                            return select && select.value;
                                        })
                                        .map(function (select) {
                                            return (select.dataset.group || select.id.replace('variant-', '')) + ':' + select.value;
                                        })
                                        .sort();

                                    if (!selectedPairs.length) {
                                        // If there are variant groups and user hasn't selected any option,
                                        // treat as no selection so UI prompts the user to choose.
                                        if (window.hasVariantGroups) return null;
                                        return window.productVariants && window.productVariants[0] ? window.productVariants[0] : null;
                                    }

                                    var variantKey = selectedPairs.join('|');
                                    return window.variantLookup[variantKey] || null;
                                }

                                function updateVariantSelection() {
                                    buildVariantLookup();

                                    var selectedVariant = getSelectedVariant();
                                    var basePrice = {{ (float) $product->price }};
                                    var priceElement = document.getElementById('variant-price');
                                    var stockMessageElement = document.querySelector('.variant-stock-message');
                                    var addButton = document.getElementById('add-to-cart-btn');

                                    var displayedPrice = basePrice;
                                    var inStock = true;
                                    var hasVariantSelection = false;

                                    if (selectedVariant && (selectedVariant.id || !window.hasVariantGroups)) {
                                        displayedPrice = selectedVariant.price;
                                        inStock = !!selectedVariant.in_stock;
                                        hasVariantSelection = true;
                                    }

                                    // If product has variant groups but user hasn't selected one,
                                    // hide price and show prompt to select an attribute first.
                                    var promptEl = document.getElementById('variant-select-prompt');
                                    if (window.hasVariantGroups && !hasVariantSelection) {
                                        if (priceElement) priceElement.style.display = 'none';
                                        if (promptEl) promptEl.style.display = '';
                                        if (addButton) {
                                            addButton.style.display = 'none';
                                            addButton.setAttribute('data-stock-available', 'false');
                                        }
                                        // hide product page inline controls
                                        try {
                                            var pageControls = document.querySelectorAll('.product-page-cart');
                                            for (const pc of pageControls) {
                                                pc.style.display = 'none';
                                            }
                                        } catch (e) {}
                                    } else {
                                        if (priceElement) {
                                            priceElement.style.display = inStock ? '' : 'none';
                                            priceElement.innerHTML = formatVariantPrice(displayedPrice) + ' <span class="currency-type">{{ env('CURRENCY') }}</span>';
                                        }
                                        if (promptEl) promptEl.style.display = 'none';
                                        if (stockMessageElement) {
                                            if (hasVariantSelection) {
                                                stockMessageElement.textContent = inStock ? 'In stock' : 'Out of stock';
                                                stockMessageElement.style.color = inStock ? '#61AFB3' : '#d9534f';
                                            } else {
                                                stockMessageElement.textContent = '';
                                            }
                                        }
                                        if (addButton) {
                                            var shouldHide = hasVariantSelection && !inStock;
                                            addButton.style.display = shouldHide ? 'none' : '';
                                            addButton.setAttribute('data-stock-available', shouldHide ? 'false' : 'true');
                                            addButton.disabled = shouldHide;
                                            addButton.classList.toggle('disabled', shouldHide);
                                            addButton.setAttribute('aria-disabled', shouldHide ? 'true' : 'false');
                                            addButton.style.pointerEvents = shouldHide ? 'none' : '';
                                        }
                                        // show or hide inline product page controls based on count
                                        try {
                                            var pageControls = document.querySelectorAll('.product-page-cart');
                                            for (const pc of pageControls) {
                                                var ppid = pc.querySelector('.product-page-cart-count')?.getAttribute('data-product-id') || '';
                                                var ppaid = pc.querySelector('.product-page-cart-count')?.getAttribute('data-product-attribute-id') || '';
                                                var pcCount = getCartItemCount(ppid, ppaid);
                                                pc.style.display = pcCount ? 'inline-flex' : 'none';
                                            }
                                        } catch (e) {}
                                    }

                                    // update product page cart count for selected variant
                                    try {
                                        var countEl = document.getElementById('product-page-count-{{ $product->id }}');
                                        if (countEl) {
                                            countEl.setAttribute('data-product-attribute-id', selectedVariant?.id || '');
                                        }
                                        if (typeof updateProductDisplays === 'function') {
                                            updateProductDisplays();
                                        }
                                    } catch (e) {}
                                }

                                function addSelectedVariantToCart(productId, image, title) {
                                    var selectedVariant = getSelectedVariant();
                                    if (!selectedVariant || (window.hasVariantGroups && !selectedVariant.id)) {
                                        return false;
                                    }

                                    if (!selectedVariant.in_stock) {
                                        return false;
                                    }

                                    var variantLabel = selectedVariant.label || Object.keys(selectedVariant.attributes || {}).map(function (key) {
                                        return selectedVariant.attributes[key];
                                    }).join(' / ');

                                    addToCart(productId, image, title, selectedVariant.price, selectedVariant.price, selectedVariant.id || null, variantLabel);
                                    return false;
                                }

                                function initVariantSelection() {
                                    var selects = document.querySelectorAll('.variant-select');

                                    selects.forEach(function (select) {
                                        select.removeEventListener('change', updateVariantSelection);
                                        select.addEventListener('change', updateVariantSelection);
                                        select.onchange = function () {
                                            window.updateVariantSelection && window.updateVariantSelection();
                                        };
                                    });

                                    window.updateVariantSelection = updateVariantSelection;
                                    window.addSelectedVariantToCart = addSelectedVariantToCart;
                                    updateVariantSelection();
                                    setTimeout(updateVariantSelection, 0);
                                }

                                document.addEventListener('DOMContentLoaded', initVariantSelection);
                                window.addEventListener('load', initVariantSelection);
                                window.addEventListener('pageshow', initVariantSelection);
                            </script>
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