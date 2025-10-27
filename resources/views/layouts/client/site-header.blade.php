<header class="site-header header-style-one">
        <div class="header-top">
            <div class="container">
                <div class="header-top-row">
                    <div class="logo-col">
                        {{-- <h1>
                            <a href="/">
                                <img src="/assets/client/images/logo.png" alt="">
                            </a>
                        </h1> --}}
                        <h3>Mikamades</h3>
                    </div>
                    <div class="header-top-right">
                        <div class="search-form-wrapper">
                            <form>
                                <div class="form-inputs">
                                    <input type="search" placeholder="Search Product..." class="form-control">
                                    <button type="submit" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                            viewBox="0 0 13 13" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.47487 10.5131C8.48031 11.2863 7.23058 11.7466 5.87332 11.7466C2.62957 11.7466 0 9.11706 0 5.87332C0 2.62957 2.62957 0 5.87332 0C9.11706 0 11.7466 2.62957 11.7466 5.87332C11.7466 7.23058 11.2863 8.48031 10.5131 9.47487L12.785 11.7465C13.0717 12.0332 13.0717 12.4981 12.785 12.7848C12.4983 13.0715 12.0334 13.0715 11.7467 12.7848L9.47487 10.5131ZM10.2783 5.87332C10.2783 8.30612 8.30612 10.2783 5.87332 10.2783C3.44051 10.2783 1.46833 8.30612 1.46833 5.87332C1.46833 3.44051 3.44051 1.46833 5.87332 1.46833C8.30612 1.46833 10.2783 3.44051 10.2783 5.87332Z"
                                                fill="#545454"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <ul class="menu-right d-flex  justify-content-end">
                            @if (auth()->user())
                            <li class="profile-header">
                                <a href="{{ route('client.profile') }}">
                                    <span class="desk-only icon-lable">My Profile: <b>{{ auth()->user()->name }}</b></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="22" viewBox="0 0 16 22"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.3699 21.0448H4.60183C4.11758 21.0448 3.72502 20.6522 3.72502 20.168C3.72502 19.6837 4.11758 19.2912 4.60183 19.2912H13.3699C13.8542 19.2912 14.2468 18.8986 14.2468 18.4143V14.7756C14.2026 14.2836 13.9075 13.8492 13.4664 13.627C10.0296 12.2394 6.18853 12.2394 2.75176 13.627C2.31062 13.8492 2.01554 14.2836 1.9714 14.7756V20.168C1.9714 20.6522 1.57883 21.0448 1.09459 21.0448C0.610335 21.0448 0.217773 20.6522 0.217773 20.168V14.7756C0.256548 13.5653 0.986136 12.4845 2.09415 11.9961C5.95255 10.4369 10.2656 10.4369 14.124 11.9961C15.232 12.4845 15.9616 13.5653 16.0004 14.7756V18.4143C16.0004 19.8671 14.8227 21.0448 13.3699 21.0448ZM12.493 4.38406C12.493 1.96281 10.5302 0 8.10892 0C5.68767 0 3.72486 1.96281 3.72486 4.38406C3.72486 6.80531 5.68767 8.76812 8.10892 8.76812C10.5302 8.76812 12.493 6.80531 12.493 4.38406ZM10.7393 4.38483C10.7393 5.83758 9.56159 7.01526 8.10884 7.01526C6.6561 7.01526 5.47841 5.83758 5.47841 4.38483C5.47841 2.93208 6.6561 1.75439 8.10884 1.75439C9.56159 1.75439 10.7393 2.93208 10.7393 4.38483Z"
                                            fill="#183A40"></path>
                                    </svg>
                                </a>
                            </li>
                            @endif
                            <li class="wishlist-header">
                                <a href="/wishlist">
                                    <span class="desk-only icon-lable">Wishlist: <b><span class="wishlist-total"></span>
                                        <span class="currency-type">{{ env('CURRENCY') }}</span></b></span>
                                    <span class="count wishcount"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.18991 3.10164C8.89678 3.37992 8.43395 3.37992 8.14082 3.10164L7.61627 2.60366C7.00231 2.0208 6.17289 1.66491 5.25627 1.66491C3.37348 1.66491 1.84718 3.17483 1.84718 5.03741C1.84718 6.82306 2.82429 8.29753 4.23488 9.50902C5.64667 10.7215 7.33461 11.5257 8.34313 11.9361C8.554 12.0219 8.77673 12.0219 8.9876 11.9361C9.99612 11.5257 11.6841 10.7215 13.0959 9.50901C14.5064 8.29753 15.4835 6.82305 15.4835 5.03741C15.4835 3.17483 13.9572 1.66491 12.0745 1.66491C11.1578 1.66491 10.3284 2.0208 9.71446 2.60366L9.18991 3.10164ZM8.66537 1.52219C7.7806 0.682237 6.57937 0.166016 5.25627 0.166016C2.53669 0.166016 0.332031 2.34701 0.332031 5.03741C0.332031 9.81007 5.61259 12.4457 7.76672 13.3223C8.34685 13.5584 8.98388 13.5584 9.56401 13.3223C11.7181 12.4457 16.9987 9.81006 16.9987 5.03741C16.9987 2.34701 14.794 0.166016 12.0745 0.166016C10.7514 0.166016 9.55013 0.682237 8.66537 1.52219Z"
                                            fill="white"></path>
                                    </svg>
                                </a>
                            </li>
                            <li class="cart-header">
                                <a href="javascript:;">
                                    <span class="desk-only icon-lable">My Cart: <b><span class="mini-total-price"></span></b></span>
                                    <span class="count cartCount"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17" viewBox="0 0 19 17"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.5698 10.627H6.97178C5.80842 10.6273 4.81015 9.79822 4.59686 8.65459L3.47784 2.59252C3.40702 2.20522 3.06646 1.92595 2.67278 1.93238H0.805055C0.360435 1.93238 0 1.57194 0 1.12732C0 0.682701 0.360435 0.322266 0.805055 0.322266H2.68888C3.85224 0.321937 4.85051 1.15101 5.0638 2.29465L6.18282 8.35672C6.25364 8.74402 6.5942 9.02328 6.98788 9.01686H15.5778C15.9715 9.02328 16.3121 8.74402 16.3829 8.35672L17.3972 2.88234C17.4407 2.64509 17.3755 2.40085 17.2195 2.21684C17.0636 2.03283 16.8334 1.92843 16.5922 1.93238H7.2455C6.80088 1.93238 6.44044 1.57194 6.44044 1.12732C6.44044 0.682701 6.80088 0.322266 7.2455 0.322266H16.5841C17.3023 0.322063 17.9833 0.641494 18.4423 1.19385C18.9013 1.74622 19.0907 2.4742 18.959 3.18021L17.9447 8.65459C17.7314 9.79822 16.7331 10.6273 15.5698 10.627ZM10.466 13.8478C10.466 12.5139 9.38464 11.4326 8.05079 11.4326C7.60617 11.4326 7.24573 11.7931 7.24573 12.2377C7.24573 12.6823 7.60617 13.0427 8.05079 13.0427C8.49541 13.0427 8.85584 13.4032 8.85584 13.8478C8.85584 14.2924 8.49541 14.6528 8.05079 14.6528C7.60617 14.6528 7.24573 14.2924 7.24573 13.8478C7.24573 13.4032 6.88529 13.0427 6.44068 13.0427C5.99606 13.0427 5.63562 13.4032 5.63562 13.8478C5.63562 15.1816 6.71693 16.2629 8.05079 16.2629C9.38464 16.2629 10.466 15.1816 10.466 13.8478ZM15.2963 15.4579C15.2963 15.0133 14.9358 14.6528 14.4912 14.6528C14.0466 14.6528 13.6862 14.2924 13.6862 13.8478C13.6862 13.4032 14.0466 13.0427 14.4912 13.0427C14.9358 13.0427 15.2963 13.4032 15.2963 13.8478C15.2963 14.2924 15.6567 14.6528 16.1013 14.6528C16.5459 14.6528 16.9064 14.2924 16.9064 13.8478C16.9064 12.5139 15.8251 11.4326 14.4912 11.4326C13.1574 11.4326 12.076 12.5139 12.076 13.8478C12.076 15.1816 13.1574 16.2629 14.4912 16.2629C14.9358 16.2629 15.2963 15.9025 15.2963 15.4579Z"
                                            fill="white"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                        <div class="mobile-menu mobile-only">
                            <button class="mobile-menu-button">
                                <div class="one"></div>
                                <div class="two"></div>
                                <div class="three"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navigationbar">
                <div class="container">
                    <div class="navigationbar-row d-flex align-items-center justify-content-between">
                        <div class="menu-items-col">
                            <ul class="main-nav">
                                @foreach ($menus as $menu)
                                <li class="menu-lnk has-item">
                                    <a href="javascript:void(0)">{{ $menu["title"] }}</a>
                                    <div class="mega-menu menu-dropdown">
                                        <div class="mega-menu-container container">
                                            <ul class="megamenu-list arrow-list">
                                                @foreach ($menu["sub_categories"] as $key => $sub_category)
                                                <li><a href="{{ route('client.productList', $key) }}">{{ $sub_category }}</a></li>
                                                @endforeach
                                                {{-- @foreach ($menus as $menu)
                                                    <li class="col-md-3 col-12">
                                                        <ul class="megamenu-list arrow-list">
                                                            <li class="list-title"><span>{{ $menu["title"] }}</span></li>
                                                            <li><a href="/product">All</a></li>
                                                            @foreach ($menu["sub_categories"] as $key => $sub_category)
                                                                <li><a href="/product">{{ $sub_category }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach --}}
                                                
                                                {{-- <li class="col-md-3 col-12">
                                                    <a href="#">
                                                        <img src="assets/client/images/menu-product.png" alt="product">
                                                    </a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>