@extends('layouts.client.site', ['page_title' => 'Checkout'])
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
                                    <span><b>Billing details</b></span> 
                                </a>
                                <div class="acnav-list"> 
                                    <h3 class="check-head">Your Personal Details</h3>
                                    <form class="personal-info-form"> 
                                        <div class="form-container">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>First Name<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>E-mail<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Telephone<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="tel" name="phone" class="form-control" value="{{ $user->phone }}">
                                                    </div>
                                                </div> 
                                            </div> 
                                        </div>  
                                    </form>
                                    <h3 class="check-head">Your Address</h3>
                                    <form class="your-add-form" method="POST" action="{{ route('client.checkout') }}"> 
                                        @csrf
                                        <div class="form-container">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>First Name<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" name="first_name" class="form-control" value="{{ $address?->first_name }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Last Name<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" name="last_name" class="form-control" value="{{ $address?->last_name }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Address 1<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" name="address_1" class="form-control" value="{{ $address?->address_1 }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>City<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" name="city" class="form-control" value="{{ $address?->city }}" required>
                                                    </div>
                                                </div>  
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Post Code<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" name="post_code" class="form-control" value="{{ $address?->post_code }}" required>
                                                    </div>
                                                </div>  
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Country<sup aria-hidden="true">*</sup>:</label>
                                                        <select name="country" class="form-control">
                                                            @foreach (['Armenia'] as $country)
                                                                <option value="{{ $country }}" @selected($address?->country === $country)>{{ $country }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>  
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Region / State<sup aria-hidden="true">*</sup>:</label>
                                                        <select name="state" class="form-control">
                                                            @foreach (['Yerevan'] as $state)
                                                                <option value="{{ $state }}" @selected($address?->state === $state)>{{ $state }}</option>
                                                            @endforeach
                                                        </select>
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
                                                    Pay & Confirm Order
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                                                        <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
                                                    </svg>
                                                </button> 
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12">
                        <div class="checkout-page-right"> 
                            <div class="mini-cart-header">
                                <h4>My Cart:<span class="checkout-cartcount cartCount"></span></h4>  
                            </div>
                            <div id="cart-body" class="mini-cart-has-item">
                                <div class="mini-cart-body"></div>
                                <div class="mini-cart-footer">
                                    <div class="mini-cart-footer-total-row d-flex align-items-center justify-content-between">
                                        <div class="mini-total-lbl">
                                            Subtotal :
                                        </div>
                                        <div class="mini-total-price"></div>
                                    </div>
                                    <div class="u-save d-flex justify-end"></div>
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