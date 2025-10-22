@extends('layouts.client.app')
@section('content')
    <!--wrapper start here-->
    <div class="wrapper">
        <section class="checkout-page padding-bottom padding-top"> 
            <div class="container"> 
                <div class="my-acc-head">
                    <div class="d-flex justify-content-start back-toshop">
                        <a href="#" class="back-btn">
                            <span class="svg-ic">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z" fill="white"></path>
                                </svg>
                            </span>
                            Back to Shop
                        </a>
                    </div>
                    <div class="section-title">
                        <h2>Checkout</h2>
                    </div>
                </div>
                <div class="row align-items-start"> 
                    <div class="col-lg-9 col-12">
                        <div class="checkout-page-left">
                            <div class="set has-children">
                                <a href="javascript:;" class="acnav-label">
                                    <span>Step 1: <b>Checkout options</b></span> 
                                </a>
                                <div class="acnav-list">
                                    <div class="row">
                                        <div class="col-md-6 col-12 ">
                                            <h3 class="check-head">New Customer?</h3>
                                            <p>By creating an account you will be able to shop faster, be up to date on an order's status, 
                                                and keep track of the orders you have previously made.</p>
                                            <div class="btn-flex d-flex align-items-center">
                                                <a href="/register" class="btn  reg-btn"> 
                                                    Register
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                                                        <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
                                                    </svg> 
                                                </a>
                                                <a class="btn login-btn" href="/login">
                                                    Login
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                                                        <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <form class="login-form">
                                                <div class="form-container">
                                                    <div class="form-heading">
                                                        <h3>Log in</h3>
                                                    </div>
                                                </div>
                                                <div class="form-container">
                                                    <div class="row"> 
                                                        <div class="col-12">
                                                            <p>I am a returning customer</p>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>E-mail<sup aria-hidden="true">*</sup>:</label>
                                                                <input type="email" class="form-control" placeholder="shop@company.com" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>Password<sup aria-hidden="true">*</sup>:</label>
                                                                <input type="text" class="form-control" placeholder="**********" required="">
                                                            </div>
                                                        </div> 
                                                    </div> 
                                                </div> 
                                                <div class="form-container">  
                                                    <div class="row align-items-center form-footer  "> 
                                                        <div class="col-lg-12  col-12 d-flex align-items-center">   
                                                            <button class="btn" type="submit">
                                                                Login
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                                                                    <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
                                                                </svg>
                                                            </button> 
                                                            <a href="#" class="forgot-pass">Forgot Password?</a>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="set has-children">
                                <a href="javascript:;" class="acnav-label">
                                    <span>Step 2: <b>Billing details</b></span> 
                                </a>
                                <div class="acnav-list"> 
                                    <h3 class="check-head">Your Personal Details</h3>
                                    <form class="personal-info-form"> 
                                        <div class="form-container">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>First Name<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" class="form-control" placeholder="John" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Last Name<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" class="form-control" placeholder="Doe" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>E-mail<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="email" class="form-control" placeholder="shop@company.com" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Telephone<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="number" class="form-control" placeholder="1234567890" required="">
                                                    </div>
                                                </div> 
                                            </div> 
                                        </div>  
                                    </form>
                                    <h3 class="check-head">Your Address</h3>
                                    <form class="your-add-form"> 
                                        <div class="form-container">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>First Name<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" class="form-control" placeholder="John" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Last Name<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" class="form-control" placeholder="Doe" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Company<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" class="form-control" placeholder="shop@company.com" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Address 1<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" class="form-control" placeholder="address" required="">
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Address 2<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" class="form-control" placeholder="address" required="">
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>City<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" class="form-control" placeholder="city" required="">
                                                    </div>
                                                </div>  
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Post Code<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" class="form-control" placeholder="post code" required="">
                                                    </div>
                                                </div>  
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Country<sup aria-hidden="true">*</sup>:</label>
                                                        <select class="form-control" style="display: none;">
                                                            <option>India</option>
                                                            <option>USA</option>
                                                            <option>Canada</option>
                                                            <option>Europe</option>
                                                        </select><div class="nice-select form-control" tabindex="0"><span class="current">India</span><ul class="list"><li data-value="India" class="option selected">India</li><li data-value="USA" class="option">USA</li><li data-value="Canada" class="option">Canada</li><li data-value="Europe" class="option">Europe</li></ul></div>
                                                    </div>
                                                </div>  
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Region / State<sup aria-hidden="true">*</sup>:</label>
                                                        <select class="form-control" style="display: none;">
                                                            <option>Up</option>
                                                            <option>Gujarat</option>
                                                            <option>Mp</option>
                                                            <option>Hp</option>
                                                        </select><div class="nice-select form-control" tabindex="0"><span class="current">Up</span><ul class="list"><li data-value="Up" class="option selected">Up</li><li data-value="Gujarat" class="option">Gujarat</li><li data-value="Mp" class="option">Mp</li><li data-value="Hp" class="option">Hp</li></ul></div>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label> </label> 
                                                        <div class="checkbox-custom">
                                                            <input type="checkbox" id="da" checked>
                                                            <label for="da">
                                                                <span>My delivery and billing addresses are the same.</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div> 
                                        <div class="form-container">   
                                            <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end"> 
                                                <button class="btn continue-btn" type="submit">
                                                    Continue
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none">
                                                        <g clip-path="url(#down)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.28956 0.546387C5.04611 0.546383 4.84876 0.743733 4.84875 0.987181L4.84862 9.59851L3.84237 8.56269C3.67274 8.38807 3.39367 8.38403 3.21905 8.55366C3.04443 8.72329 3.04039 9.00236 3.21002 9.17698L4.97323 10.992C5.05623 11.0774 5.17028 11.1257 5.2894 11.1257C5.40852 11.1257 5.52257 11.0774 5.60558 10.992L7.36878 9.17698C7.53841 9.00236 7.53437 8.72329 7.35975 8.55366C7.18514 8.38403 6.90606 8.38807 6.73643 8.56269L5.73022 9.59847L5.73035 0.987195C5.73036 0.743747 5.53301 0.54639 5.28956 0.546387Z" fill="white"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="down">
                                                                <rect width="10.5792" height="10.5792" fill="white" transform="translate(10.5791 0.546387) rotate(90)"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button> 
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="set has-children">
                                <a href="javascript:;" class="acnav-label">
                                    <span>Step 3: <b>Delivery Method </b></span> 
                                </a>
                                <div class="acnav-list">
                                    <h3 class="check-head">Select Your Delivery</h3>
                                    <p>Please select the preferred shipping method to use on this order.</p>
                                    <form  class="payment-method-form"> 
                                        <div class="radio-group">
                                            <input type="radio" id="dhsd" name="payment" checked="">
                                            <label for="dhsd">
                                                <span><b>DHL</b> Delivery</span>
                                                <div class="center-descrp">
                                                    Please select the preferred payment method to use on this order. 
                                                </div>
                                                <div class="radio-right">
                                                    <p>Price:</p>
                                                    <b>$5.00</b>
                                                    <img src="assets/client/images/dhl_logo-1.png" alt="dhl">
                                                </div>
                                            </label>
                                        </div>
                                        <div class="radio-group">
                                            <input type="radio" id="ship2" name="payment">
                                            <label for="ship2"> 
                                                <span><b>Flat</b> Shipping Rate</span>
                                                <div class="center-descrp"> 
                                                    Please select the preferred shipping method to use on this order.
                                                </div>
                                                <div class="radio-right">
                                                    <p>Price:</p>
                                                    <b>$5.00</b>
                                                    <img src="assets/client/images/truck.png" alt="dhl">
                                                </div>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Add Comments About Your Order:</label>
                                            <textarea class="form-control" name="message" placeholder="Description" rows="8"></textarea>
                                        </div>
                                        <div class="form-container">   
                                            <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end"> 
                                                <button class="btn continue-btn" type="submit">
                                                    Continue
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none">
                                                        <g clip-path="url(#down)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.28956 0.546387C5.04611 0.546383 4.84876 0.743733 4.84875 0.987181L4.84862 9.59851L3.84237 8.56269C3.67274 8.38807 3.39367 8.38403 3.21905 8.55366C3.04443 8.72329 3.04039 9.00236 3.21002 9.17698L4.97323 10.992C5.05623 11.0774 5.17028 11.1257 5.2894 11.1257C5.40852 11.1257 5.52257 11.0774 5.60558 10.992L7.36878 9.17698C7.53841 9.00236 7.53437 8.72329 7.35975 8.55366C7.18514 8.38403 6.90606 8.38807 6.73643 8.56269L5.73022 9.59847L5.73035 0.987195C5.73036 0.743747 5.53301 0.54639 5.28956 0.546387Z" fill="white"></path>
                                                        </g>
                                                    </svg>
                                                </button> 
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="set has-children">
                                <a href="javascript:;" class="acnav-label">
                                    <span>Step 4: <b>Payments Method</b></span> 
                                </a>
                                <div class="acnav-list">
                                    <h3 class="check-head">Select Your Delivery</h3>
                                    <p>Please select the preferred shipping method to use on this order.</p>
                                    <form  class="payment-method-form"> 
                                        <div class="radio-group">
                                            <input type="radio" id="ppl" name="paypal" checked="">
                                            <label for="ppl">
                                                <span><b>PayPal</b> </span>
                                                <div class="center-descrp">
                                                    Please select the preferred payment method to use on this order.
                                                </div>
                                                <div class="radio-right">
                                                    <p>Additional price:</p>
                                                    <b>$0.00</b>
                                                    <img src="assets/client/images/paypal-2.png" alt="paypal">
                                                </div>
                                            </label>
                                        </div>
                                        <div class="radio-group">
                                            <input type="radio" id="ship" name="paypal">
                                            <label for="ship"> 
                                                <span>Cash on Delivery</span>
                                                <div class="center-descrp"> 
                                                    Please select the preferred payment method to use on this order.
                                                </div>
                                                <div class="radio-right">
                                                    <p>Additional price:</p>
                                                    <b>$1.00</b>
                                                    <img src="assets/client/images/dhl-2.png" alt="dhl">
                                                </div>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Add Comments About Your Order:</label>
                                            <textarea class="form-control" name="message" placeholder="Description" rows="8"></textarea>
                                        </div>
                                        <div class="form-container">   
                                            <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end"> 
                                                <div class="checkbox-custom">
                                                    <input type="checkbox" id="agg">
                                                    <label for="agg">
                                                        <span>I have read and agree to the <a href="/privacy-policy">Terms &amp; Conditions.</a>  </span>
                                                    </label>
                                                </div>
                                                <button class="btn continue-btn" type="submit">
                                                    Continue
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none">
                                                        <g clip-path="url(#down)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.28956 0.546387C5.04611 0.546383 4.84876 0.743733 4.84875 0.987181L4.84862 9.59851L3.84237 8.56269C3.67274 8.38807 3.39367 8.38403 3.21905 8.55366C3.04443 8.72329 3.04039 9.00236 3.21002 9.17698L4.97323 10.992C5.05623 11.0774 5.17028 11.1257 5.2894 11.1257C5.40852 11.1257 5.52257 11.0774 5.60558 10.992L7.36878 9.17698C7.53841 9.00236 7.53437 8.72329 7.35975 8.55366C7.18514 8.38403 6.90606 8.38807 6.73643 8.56269L5.73022 9.59847L5.73035 0.987195C5.73036 0.743747 5.53301 0.54639 5.28956 0.546387Z" fill="white"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="down">
                                                                <rect width="10.5792" height="10.5792" fill="white" transform="translate(10.5791 0.546387) rotate(90)"></rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button> 
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="set has-children">
                                <a href="javascript:;" class="acnav-label">
                                    <span>Step 5: <b> Confirm Order</b></span> 
                                </a>
                                <div class="acnav-list">
                                    <h3 class="check-head">Confirm order</h3>
                                    <p>Please select the preferred payment method to use on this order.</p>
                                    <div class="order-confirmation-body">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 col-12">
                                                <div class="order-confirm-details">
                                                    <h5>Billing informations:</h5>
                                                    <ul>
                                                        <li>1x Sunglasses with black ($24.99)</li>
                                                        <li>1x Sunglasses with black ($24.99)</li>
                                                        <li>1x Sunglasses with black ($24.99)</li>
                                                        <li>1x Sunglasses with black ($24.99)</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-12">
                                                <div class="order-confirm-details">
                                                    <h5>Delivery informations:</h5>
                                                    <p>John Doe<br>
                                                        King Street 30/21<br>
                                                        00-211 Bridgeshire<br>
                                                        United Kingdom</p>
 
                                                    <div class="link"><a href="tel:000-111-222">Phone: 000-111-222</a></div>
                                                    <div class="link"><a href="mailto:shop@company.com">Email: shop@company.com</a></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-12">
                                                <div class="order-confirm-details">
                                                    <h5>Billing informations:</h5>
                                                    <p>John Doe<br>
                                                        King Street 30/21<br>
                                                        00-211 Bridgeshire<br>
                                                        United Kingdom</p>
 
                                                    <div class="link"><a href="tel:000-111-222">Phone: 000-111-222</a></div>
                                                    <div class="link"><a href="mailto:shop@company.com">Email: shop@company.com</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="form-container">   
                                        <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end"> 
                                            <button class="btn continue-btn" type="submit">
                                                Confirm Order
                                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                                                    <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
                                                </svg>
                                            </button> 
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12">
                        <div class="checkout-page-right"> 
                            <div class="mini-cart-header">
                                <h4>My Cart:<span class="checkout-cartcount cartCount">[123]</span></h4>  
                            </div>
                            <div id="cart-body" class="mini-cart-has-item">
                                <div class="mini-cart-body"></div>
                                <div class="mini-cart-footer">
                                    <div class="mini-cart-footer-total-row d-flex align-items-center justify-content-between">
                                        <div class="mini-total-lbl">
                                            Subtotal :
                                        </div>
                                        <div class="mini-total-price">
                                            $207.00
                                        </div>
                                    </div>
                                    <div class="u-save d-flex justify-end">
                                        You Save: $60.00
                                    </div>
                                    <button class="btn checkout-btn">
                                        checkout
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                                            <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
                                        </svg>
                                    </button> 
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