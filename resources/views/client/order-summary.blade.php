@extends('layouts.client.site', ['page_title' => 'Order'])
@section('content')
    <!--wrapper start here-->
    <div class="wrapper">
        <section class="order-summery-page padding-bottom padding-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-12">
                        <div class="section-title d-flex align-items-center justify-content-between">
                            <h2>Order #10 History</h2>
                            <div class="dated">
                                <b>Date Added:</b>
                                21 Feb, 2022    
                            </div>
                        </div>
                        <div class="order-confirmation">
                            <h4>Order Items</h4>
                            <div class="order-confirmation-body"> 
                                <table class="order-history-tbl"> 
                                    <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">date</th>
                                        <th scope="col">quantity</th>
                                        <th scope="col">Price</th> 
                                        <th scope="col">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="Product">
                                            <a href="/product" class="pro-img-cart">
                                                <img src="assets/client/images/cart.png">
                                            </a>
                                        </td> 
                                        <td data-label="Name">
                                            <a href="/product">Handmade silk soap</a>
                                            <div class="product-option">
                                                <dt>Size: </dt>
                                                <dd>S</dd>
                                            </div>
                                        </td>
                                        <td data-label="date">11/08/22</td>
                                        <td data-label="quantity">
                                            <div class="qty-spinner">
                                                <button type="button" class="quantity-decrement ">
                                                    <svg width="12" height="2" viewBox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 0.251343V1.74871H12V0.251343H0Z" fill="#61AFB3"></path>
                                                    </svg>
                                                </button>
                                                <input type="text" class="quantity" data-cke-saved-name="quantity" name="quantity" value="01" min="01" max="100">
                                                <button type="button" class="quantity-increment ">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.74868 5.25132V0H5.25132V5.25132H0V6.74868H5.25132V12H6.74868V6.74868H12V5.25132H6.74868Z" fill="#61AFB3"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                        <td data-label="Price"> 
                                            $2,100.00
                                        </td> 
                                        <td data-label="Total">
                                            $2,107.00
                                            <a href="javascript:;" class="remove-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true" focusable="false" role="presentation" class="icon icon-remove">
                                                    <path d="M14 3h-3.53a3.07 3.07 0 00-.6-1.65C9.44.82 8.8.5 8 .5s-1.44.32-1.87.85A3.06 3.06 0 005.53 3H2a.5.5 0 000 1h1.25v10c0 .28.22.5.5.5h8.5a.5.5 0 00.5-.5V4H14a.5.5 0 000-1zM6.91 1.98c.23-.29.58-.48 1.09-.48s.85.19 1.09.48c.2.24.3.6.36 1.02h-2.9c.05-.42.17-.78.36-1.02zm4.84 11.52h-7.5V4h7.5v9.5z" fill="currentColor"></path>
                                                    <path d="M6.55 5.25a.5.5 0 00-.5.5v6a.5.5 0 001 0v-6a.5.5 0 00-.5-.5zM9.45 5.25a.5.5 0 00-.5.5v6a.5.5 0 001 0v-6a.5.5 0 00-.5-.5z" fill="currentColor"></path>
                                                </svg> 
                                            </a>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td data-label="Product">
                                            <a href="/product" class="pro-img-cart">
                                                <img src="assets/client/images/cart.png">
                                            </a>
                                        </td>
                                        <td data-label="Name">
                                            <a href="/product">Handmade silk soap</a>
                                            <div class="product-option">
                                                <dt>Color: </dt>
                                                <dd>Blue</dd>
                                            </div> 
                                        </td>
                                        <td data-label="date">11/08/22</td>
                                        <td data-label="quantity">
                                            <div class="qty-spinner">
                                                <button type="button" class="quantity-decrement ">
                                                    <svg width="12" height="2" viewBox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 0.251343V1.74871H12V0.251343H0Z" fill="#61AFB3"></path>
                                                    </svg>
                                                </button>
                                                <input type="text" class="quantity" data-cke-saved-name="quantity" name="quantity" value="01" min="01" max="100">
                                                <button type="button" class="quantity-increment ">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.74868 5.25132V0H5.25132V5.25132H0V6.74868H5.25132V12H6.74868V6.74868H12V5.25132H6.74868Z" fill="#61AFB3"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                        <td data-label="Price"> 
                                            $2,100.00
                                        </td> 
                                        <td data-label="Total">
                                            $2,107.00
                                            <a href="javascript:;" class="remove-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true" focusable="false" role="presentation" class="icon icon-remove">
                                                    <path d="M14 3h-3.53a3.07 3.07 0 00-.6-1.65C9.44.82 8.8.5 8 .5s-1.44.32-1.87.85A3.06 3.06 0 005.53 3H2a.5.5 0 000 1h1.25v10c0 .28.22.5.5.5h8.5a.5.5 0 00.5-.5V4H14a.5.5 0 000-1zM6.91 1.98c.23-.29.58-.48 1.09-.48s.85.19 1.09.48c.2.24.3.6.36 1.02h-2.9c.05-.42.17-.78.36-1.02zm4.84 11.52h-7.5V4h7.5v9.5z" fill="currentColor"></path>
                                                    <path d="M6.55 5.25a.5.5 0 00-.5.5v6a.5.5 0 001 0v-6a.5.5 0 00-.5-.5zM9.45 5.25a.5.5 0 00-.5.5v6a.5.5 0 001 0v-6a.5.5 0 00-.5-.5z" fill="currentColor"></path>
                                                </svg> 
                                            </a>
                                        </td>
                                    </tr> 
                                    </tbody>
                                </table> 
                                <div class="order-payment-box">
                                    <div class="order-paymentcol">
                                        <div class="order-paycol-inner">
                                            <p>Payment method:</p>
                                            <img src="assets/client/images/paypal.png" alt="paypal">
                                        </div>
                                    </div>
                                    <div class="order-paymentcol">
                                        <div class="order-paycol-inner">
                                            <p>Delivery method</p>
                                            <img src="assets/client/images/dhl.png" alt="dhl">
                                        </div>
                                    </div>
                                    <div class="order-paymentcol">
                                        <div class="order-paycol-inner">
                                            <div class="d-flex align-items-center justify-content-between payment-ttl-row">
                                                <div class="payment-ttl-left">
                                                    <span>
                                                        Sub-total:
                                                    <b> $290.00</b>
                                                    </span>
                                                    <span>
                                                        VAT (20%)
                                                        <b>$41.30</b>
                                                    </span>
                                                </div>
                                                <div class="payment-ttl-left">
                                                    <h5>Total:</h5>
                                                    <div class="ttl-pric">
                                                        $2,107.00
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-12"> 
                        <div class="order-confirmation">
                            <h4>Order informations</h4>
                            <div class="order-confirmation-body">
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="order-confirm-details">
                                            <h5>Billing informations:</h5>
                                            <p>John Doe<br>
                                                King Street 30/21<br>
                                                00-211 Bridgeshire<br>
                                                United Kingdom</ 
                                            <div class="link"><a href="tel:000-111-222">Phone: 000-111-222</a></div>
                                            <div class="link"><a href="mailto:shop@company.com">Email: shop@company.com</a></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="order-confirm-details">
                                            <h5>Delivery informations:</h5>
                                            <p>John Doe<br>
                                                King Street 30/21<br>
                                                00-211 Bridgeshire<br>
                                                United Kingdom</ 
                                            <div class="link"><a href="tel:000-111-222">Phone: 000-111-222</a></div>
                                            <div class="link"><a href="mailto:shop@company.com">Email: shop@company.com</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </section>    
    </div>
    <!---wrapper end here-->
@endsection