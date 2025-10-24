<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Logistics Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <title>{{ env('APP_NAME') }} | {{ $page_title }}</title>
    <meta name="description" content="Logistics Theme">
    <meta name="keywords" content="Logistics Theme">
    <link rel="shortcut icon" href="/assets/client/images/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/client/css/main-style.css">
    <link rel="stylesheet" href="/assets/client/css/responsive.css">
</head>

<body class="home-page">
    <!--header start here-->
    @include('layouts.client.site-header')
    <!--header end here-->
    
    @yield('content')
    
    @include('layouts.client.site-footer')

    <!-- Mobile menu start here -->
    @include('layouts.client.mobile-menu')
    <!-- Mobile menu end here -->

    <!--cart popup start here-->
    @include('layouts.client.cart')
    <!--cart popup ends here-->
    
    <div class="overlay"></div>
    
    <!--scripts start here-->
    <script src="/assets/client/js/jquery.min.js"></script>
    <script src="/assets/client/js/slick.min.js" defer="defer"></script>
    <script src='/assets/client/js/custom.js' defer="defer"></script>
    <script src='/assets/client/js/utils.js' type="text/javascript"></script>
    <!--scripts end here-->

    <script>
        updateCart();
        getWishListCount();
        
        function updateCart() {
            var local_cart_items = getUserCartFromStorage();
            
            var local_cart_items_length = Object.keys(local_cart_items).length;
            var elements = document.getElementsByClassName("cartCount");
            for (const el of elements)
                el.innerHTML = local_cart_items_length;

            
            var carts = document.getElementsByClassName("mini-cart-body");
            for (const el of carts)
                el.innerHTML = "";

                var total = 0;
            for (const key in local_cart_items) {
                var item = local_cart_items[key];
                total += parseFloat(item.priceAfter);
                const child = document.createElement("div");
                child.setAttribute("class", "mini-cart-item");
                child.setAttribute("id", `cart_item_${key}`);
                child.innerHTML = `<div class="mini-cart-image">
                        <a href="#" title="SPACE BAG">
                            <img src="${item.image}" alt="${item.title}">
                        </a>
                    </div>
                    <div class="mini-cart-details">
                        <p class="mini-cart-title"><a href="#">${item.title}</a></p>
                        <div class="pvarprice d-flex align-items-center justify-content-between">
                            <div class="price">
                                <ins>${item.priceBefore} <span class="currency-type">{{ env('CURRENCY') }}</span></ins><del>${item.priceAfter} {{ env('CURRENCY') }}</del>
                            </div>
                            <a class="remove_item" title="Remove item" href="#" onclick="removeFromCart('${key}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path
                                        d="M12.7589 7.24609C12.5002 7.24609 12.2905 7.45577 12.2905 7.71448V16.5669C12.2905 16.8255 12.5002 17.0353 12.7589 17.0353C13.0176 17.0353 13.2273 16.8255 13.2273 16.5669V7.71448C13.2273 7.45577 13.0176 7.24609 12.7589 7.24609Z"
                                        fill="#61AFB3"></path>
                                    <path
                                        d="M7.23157 7.24609C6.97286 7.24609 6.76318 7.45577 6.76318 7.71448V16.5669C6.76318 16.8255 6.97286 17.0353 7.23157 17.0353C7.49028 17.0353 7.69995 16.8255 7.69995 16.5669V7.71448C7.69995 7.45577 7.49028 7.24609 7.23157 7.24609Z"
                                        fill="#61AFB3"></path>
                                    <path
                                        d="M3.20333 5.95419V17.4942C3.20333 18.1762 3.45344 18.8168 3.89035 19.2764C4.32525 19.7373 4.93049 19.9989 5.56391 20H14.4259C15.0594 19.9989 15.6647 19.7373 16.0994 19.2764C16.5363 18.8168 16.7864 18.1762 16.7864 17.4942V5.95419C17.6549 5.72366 18.2177 4.8846 18.1016 3.99339C17.9852 3.10236 17.2261 2.43583 16.3274 2.43565H13.9293V1.85017C13.932 1.35782 13.7374 0.885049 13.3888 0.537238C13.0403 0.18961 12.5668 -0.00396362 12.0744 6.15416e-05H7.91533C7.42298 -0.00396362 6.94948 0.18961 6.60093 0.537238C6.25239 0.885049 6.05772 1.35782 6.06046 1.85017V2.43565H3.66238C2.76367 2.43583 2.00456 3.10236 1.8882 3.99339C1.77202 4.8846 2.33481 5.72366 3.20333 5.95419ZM14.4259 19.0632H5.56391C4.76308 19.0632 4.14009 18.3753 4.14009 17.4942V5.99536H15.8497V17.4942C15.8497 18.3753 15.2267 19.0632 14.4259 19.0632ZM6.99723 1.85017C6.99412 1.60628 7.08999 1.37154 7.26307 1.19938C7.43597 1.02721 7.67126 0.932619 7.91533 0.936827H12.0744C12.3185 0.932619 12.5538 1.02721 12.7267 1.19938C12.8998 1.37136 12.9956 1.60628 12.9925 1.85017V2.43565H6.99723V1.85017ZM3.66238 3.37242H16.3274C16.793 3.37242 17.1705 3.74987 17.1705 4.21551C17.1705 4.68114 16.793 5.05859 16.3274 5.05859H3.66238C3.19674 5.05859 2.81929 4.68114 2.81929 4.21551C2.81929 3.74987 3.19674 3.37242 3.66238 3.37242Z"
                                        fill="#61AFB3"></path>
                                    <path
                                        d="M9.99523 7.24609C9.73653 7.24609 9.52686 7.45577 9.52686 7.71448V16.5669C9.52686 16.8255 9.73653 17.0353 9.99523 17.0353C10.2539 17.0353 10.4636 16.8255 10.4636 16.5669V7.71448C10.4636 7.45577 10.2539 7.24609 9.99523 7.24609Z"
                                        fill="#61AFB3"></path>
                                    <defs>
                                        <clipPath>
                                            <rect width="20" height="20" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                    </div>`;
                    for (const el of carts)
                        el.append(child);
            }
            var totals = document.getElementsByClassName("mini-total-price");
            for (const el of totals)
                el.innerHTML = `${total.toFixed(2)} {{ env('CURRENCY') }}`;
        }

        function getWishListCount() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "{{ route('client.wishList.count') }}", true);
            xhr.addEventListener("load", function () {
                var response = JSON.parse(xhr.response);
                var elements = document.getElementsByClassName("wishcount");
                for (const el of elements)
                    el.innerHTML = response.data?.count || 0;
                var totals = document.getElementsByClassName("wishlist-total");
                for (const el of totals)
                    el.innerHTML = response.data?.sum || 0;
                
            });

            xhr.send();
        }

        function getCartFromServer() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "{{ route('client.cart.api') }}", true);
            xhr.addEventListener("load", function () {
                var response = JSON.parse(xhr.response);
            });

            xhr.send();
        }
        
        function openCart() {
            setTimeout(function () {
                $("body").addClass("no-scroll cartOpen");
                $(".overlay").addClass("cart-overlay");
            }, 100);
        }

        function getUserCartFromStorage() {
            var userCart = {};
            var userCartString = localStorage.getItem("userCart");
            if (userCartString) {
                userCart = JSON.parse(userCartString);
            }

            return userCart;
        }

        function sendCartToServer(id, type) {
            var formData = createFormData({
                _token: "{{csrf_token()}}",
                product_id: id,
                type,
            });

            var params = {
                method: "POST",
                route: "{{ route('client.addToCart') }}",
                formData,
            };

            sendRequest(params);
        }

        function addToCart(id, image, title, priceBefore, priceAfter) {
            var userCart = getUserCartFromStorage();

            if (!Object.keys(userCart).includes(id)) {
                userCart[id] = {
                    image,
                    title,
                    priceBefore,
                    priceAfter,
                };
                localStorage.setItem("userCart", JSON.stringify(userCart));
            }

            sendCartToServer(id, "inc");
            reloadPageIfInCart();
        }

        function removeFromCart(id) {
            var userCart = getUserCartFromStorage();

            if (Object.keys(userCart).includes(id)) {
                delete userCart[id];
                localStorage.setItem("userCart", JSON.stringify(userCart));
            }

            // remove from cart page
            var elm = document.getElementById(`cart-item-${id}`);
            if (elm) elm.remove();
                
            sendCartToServer(id, "dec");
            reloadPageIfInCart();
        }

        function reloadPageIfInCart() {
            if (window.location.pathname === "/cart") {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                updateCart();
                openCart();
            }
        }

        function manipulateWishList(id) {
            var formData = createFormData({
                _token: "{{csrf_token()}}",
                product_id: id
            });

            var params = {
                method: "POST",
                route: "{{ route('client.wishList.add') }}",
                formData,
            };

            sendRequest(params);

            if (window.location.pathname === "/wishlist") {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                getWishListCount();
                var wishable = document.getElementById(`product-wishable-${id}`);
                var fill_rule = wishable.getAttribute("fill-rule");
                if (fill_rule === "evenodd") {
                    wishable.setAttribute("fill-rule", "nonezero");
                } else {
                    wishable.setAttribute("fill-rule", "evenodd");
                }
            }
            
        }

    </script>
  </body>
</html>