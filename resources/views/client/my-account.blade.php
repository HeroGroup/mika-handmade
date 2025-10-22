@extends('layouts.client.site', ['page_title' => 'Account'])
@section('content')
    <!--wrapper start here-->
    <div class="wrapper">
        <section class="my-account-page padding-bottom"> 
            <div class="container"> 
                <div class="my-acc-head">
                    <div class="section-title">
                        <h2>My Account</h2>
                    </div>
                </div>
                <div class="row align-items-start">
                    <div class="col-lg-3 col-md-4 col-12 my-acc-column" id="scroll">
                        <div class="my-acc-leftbar">
                            <h4>Account Settings</h4> 
                            <ul class="account-list" id="account-nav"> 
                                <li class="active">
                                    <a href="#account-tab" data-scroll="account-tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 13C8.13401 13 5 16.134 5 20V22C5 22.5523 4.55228 23 4 23C3.44772 23 3 22.5523 3 22V20C3 15.0294 7.02944 11 12 11C16.9706 11 21 15.0294 21 20V22C21 22.5523 20.5523 23 20 23C19.4477 23 19 22.5523 19 22V20C19 16.134 15.866 13 12 13Z" fill="#183A40"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11ZM12 13C15.3137 13 18 10.3137 18 7C18 3.68629 15.3137 1 12 1C8.68629 1 6 3.68629 6 7C6 10.3137 8.68629 13 12 13Z" fill="#183A40"/>
                                        </svg>
                                        <span>
                                            <b>Edit your account information</b> edit your account
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#password-tab" data-scroll="password-tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 11C10.2274 11 8.64844 11.0646 7.35838 11.1466C6.13471 11.2243 5.19379 12.158 5.10597 13.373C5.0435 14.2373 5 15.1481 5 16C5 16.8519 5.0435 17.7627 5.10597 18.627C5.19379 19.842 6.13471 20.7757 7.35838 20.8534C8.64844 20.9354 10.2274 21 12 21C13.7726 21 15.3516 20.9354 16.6416 20.8534C17.8653 20.7757 18.8062 19.842 18.894 18.627C18.9565 17.7627 19 16.8519 19 16C19 15.1481 18.9565 14.2373 18.894 13.373C18.8062 12.158 17.8653 11.2243 16.6416 11.1466C15.3516 11.0646 13.7726 11 12 11ZM7.2315 9.15059C5.01376 9.29156 3.27137 11.0124 3.11117 13.2288C3.04652 14.1234 3 15.085 3 16C3 16.915 3.04652 17.8766 3.11118 18.7712C3.27137 20.9876 5.01376 22.7084 7.23151 22.8494C8.55778 22.9337 10.1795 23 12 23C13.8205 23 15.4422 22.9337 16.7685 22.8494C18.9862 22.7084 20.7286 20.9876 20.8888 18.7712C20.9535 17.8766 21 16.915 21 16C21 15.085 20.9535 14.1234 20.8888 13.2288C20.7286 11.0124 18.9862 9.29156 16.7685 9.15059C15.4422 9.06629 13.8205 9 12 9C10.1795 9 8.55778 9.06629 7.2315 9.15059Z" fill="#67898F"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13 16.7324C13.5978 16.3866 14 15.7403 14 15C14 13.8954 13.1046 13 12 13C10.8954 13 10 13.8954 10 15C10 15.7403 10.4022 16.3866 11 16.7324V18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18V16.7324Z" fill="#67898F"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6V10C17 10.5523 16.5523 11 16 11C15.4477 11 15 10.5523 15 10V6C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6V10C9 10.5523 8.55228 11 8 11C7.44772 11 7 10.5523 7 10V6Z" fill="#67898F"/>
                                        </svg>
                                        <span>
                                            <b>Change your password</b> Change Your Passowrd
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#address-tab" data-scroll="address-tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19 20C19.5523 20 20 19.5523 20 19C20 18.4477 19.5523 18 19 18C18.4477 18 18 18.4477 18 19C18 19.5523 18.4477 20 19 20ZM19 22C20.6569 22 22 20.6569 22 19C22 17.3431 20.6569 16 19 16C17.3431 16 16 17.3431 16 19C16 20.6569 17.3431 22 19 22Z" fill="#67898F"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5 4C14.1193 4 13 5.11929 13 6.5V17.5C13 19.9853 10.9853 22 8.5 22C6.01472 22 4 19.9853 4 17.5V10C4 9.44772 4.44772 9 5 9C5.55228 9 6 9.44772 6 10V17.5C6 18.8807 7.11929 20 8.5 20C9.88071 20 11 18.8807 11 17.5V6.5C11 4.01472 13.0147 2 15.5 2C17.9853 2 20 4.01472 20 6.5V13C20 13.5523 19.5523 14 19 14C18.4477 14 18 13.5523 18 13V6.5C18 5.11929 16.8807 4 15.5 4Z" fill="#67898F"/>
                                            <path d="M4.13595 2.48099C4.52183 1.81949 5.47763 1.81949 5.86351 2.48099L7.62247 5.49636C8.01135 6.16302 7.53048 7.00023 6.75869 7.00023H3.24076C2.46897 7.00023 1.9881 6.16301 2.37699 5.49636L4.13595 2.48099Z" fill="#67898F"/>
                                        </svg>
                                        <span>
                                            <b>Modify your address book entries</b> Edit your address
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#orders-tab" data-scroll="orders-tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20 13H13.5C13.2239 13 13 13.2239 13 13.5V20.5C13 20.7761 13.2239 21 13.5 21H20C20.5523 21 21 20.5523 21 20V14C21 13.4477 20.5523 13 20 13ZM11 11V23H20C21.6569 23 23 21.6569 23 20V14C23 12.3431 21.6569 11 20 11H11Z" fill="#67898F"/>
                                            <path d="M16 11H18V14C18 14.5523 17.5523 15 17 15C16.4477 15 16 14.5523 16 14V11Z" fill="#67898F"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11 13.5C11 13.2239 10.7761 13 10.5 13H4C3.44772 13 3 13.4477 3 14V20C3 20.5523 3.44772 21 4 21H10.5C10.7761 21 11 20.7761 11 20.5V13.5ZM4 11C2.34315 11 1 12.3431 1 14V20C1 21.6569 2.34315 23 4 23H13V11H4Z" fill="#67898F"/>
                                            <path d="M6 11H8V14C8 14.5523 7.55228 15 7 15C6.44772 15 6 14.5523 6 14V11Z" fill="#67898F"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 3H9C8.44772 3 8 3.44772 8 4V11H16V4C16 3.44772 15.5523 3 15 3ZM9 1C7.34315 1 6 2.34315 6 4V13H18V4C18 2.34315 16.6569 1 15 1H9Z" fill="#67898F"/>
                                            <path d="M11 1H13V4C13 4.55228 12.5523 5 12 5C11.4477 5 11 4.55228 11 4V1Z" fill="#67898F"/>
                                        </svg>
                                        <span>
                                            <b>View your order history</b> See your order history
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#transactions-tab" data-scroll="transactions-tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6C2 3.79086 3.79086 2 6 2H18C20.2091 2 22 3.79086 22 6V18C22 20.2091 20.2091 22 18 22H6C3.79086 22 2 20.2091 2 18V6ZM6 4H18C19.1046 4 20 4.89543 20 6V11H4V6C4 4.89543 4.89543 4 6 4ZM4 13V18C4 19.1046 4.89543 20 6 20H18C19.1046 20 20 19.1046 20 18V13H4Z" fill="#67898F"/>
                                            <path d="M10 6C9.44772 6 9 6.44772 9 7C9 7.55228 9.44772 8 10 8H14C14.5523 8 15 7.55228 15 7C15 6.44772 14.5523 6 14 6H10Z" fill="#67898F"/>
                                            <path d="M10 15C9.44772 15 9 15.4477 9 16C9 16.5523 9.44772 17 10 17H14C14.5523 17 15 16.5523 15 16C15 15.4477 14.5523 15 14 15H10Z" fill="#67898F"/>
                                        </svg>
                                        <span>
                                            <b>Your Transactions</b> See your Transaction
                                        </span>
                                    </a>
                                </li>
                                <li class="ogout-link">
                                    <a href="/login">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1096 13.7506C10.6155 13.7315 11.0411 14.1261 11.0602 14.632C11.1033 15.7725 11.1638 16.605 11.2232 17.2018C11.2818 17.7895 11.6366 18.1432 12.1312 18.2036C12.7144 18.2749 13.5372 18.3333 14.6662 18.3333C15.7953 18.3333 16.618 18.2749 17.2012 18.2036C17.6956 18.1432 18.0506 17.7894 18.1092 17.2015C18.2195 16.0937 18.3329 14.1797 18.3329 11C18.3329 7.82021 18.2195 5.90623 18.1092 4.79841C18.0506 4.21051 17.6956 3.85671 17.2012 3.79627C16.618 3.72498 15.7953 3.66662 14.6662 3.66662C13.5372 3.66662 12.7144 3.72497 12.1312 3.79627C11.6366 3.85673 11.2818 4.21037 11.2232 4.79813C11.1638 5.39495 11.1033 6.22737 11.0602 7.36787C11.0411 7.87377 10.6155 8.2684 10.1096 8.24931C9.60374 8.23021 9.20911 7.80461 9.2282 7.29871C9.2724 6.1281 9.33505 5.25743 9.39891 4.61639C9.53316 3.26874 10.4728 2.15202 11.9088 1.97648C12.5772 1.89477 13.4753 1.83329 14.6662 1.83329C15.8572 1.83329 16.7552 1.89477 17.4237 1.97649C18.8598 2.15205 19.7992 3.26929 19.9335 4.61668C20.0517 5.80308 20.1662 7.78106 20.1662 11C20.1662 14.2189 20.0516 16.1968 19.9335 17.3832C19.7992 18.7306 18.8598 19.8479 17.4237 20.0234C16.7552 20.1051 15.8572 20.1666 14.6662 20.1666C13.4753 20.1666 12.5772 20.1051 11.9088 20.0234C10.4728 19.8479 9.53316 18.7312 9.39891 17.3835C9.33505 16.7425 9.2724 15.8718 9.2282 14.7012C9.20911 14.1953 9.60374 13.7697 10.1096 13.7506Z" fill="#FE4D4D"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.60652 13.5602C6.96451 13.9181 6.96451 14.4985 6.60652 14.8565C6.24854 15.2145 5.66814 15.2145 5.31016 14.8565L2.10183 11.6482C1.74385 11.2902 1.74385 10.7098 2.10183 10.3518L5.31016 7.14349C5.66814 6.7855 6.24854 6.7855 6.60652 7.14349C6.96451 7.50147 6.96451 8.08187 6.60652 8.43985L4.96304 10.0833H13.75C14.2563 10.0833 14.6667 10.4937 14.6667 11C14.6667 11.5063 14.2563 11.9167 13.75 11.9167L4.96304 11.9167L6.60652 13.5602Z" fill="#FE4D4D"/>
                                        </svg>
                                        <span>
                                            <b>Logout </b>
                                            See you soon!
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="my-acc-rightbar">
                            <div id="account-tab" class="my-acc-right-content">
                                <div class="section-title">
                                    <h2>Your Personal Details</h2>
                                </div>
                                <div class="form-wrapper">
                                    <form method="POST" action={{ route('client.profile.update') }}>
                                        @csrf
                                        <div class="form-container">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>First Name<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="text" name="name" value="{{ auth()?->user()?->name }}" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>E-mail<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="email" name="email" value="{{ auth()?->user()?->email }}" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Telephone:</label>
                                                        <input type="number" name="phone" value="{{ auth()?->user()?->phone }}" class="form-control" />
                                                    </div>
                                                </div> 
                                            </div> 
                                        </div> 
                                        <div class="form-container">   
                                            <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
                                                <button class="btn continue-btn" type="submit">
                                                    Save
                                                </button> 
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="password-tab" class="my-acc-right-content">
                                <div class="section-title">
                                    <h2>Change Password</h2>
                                </div>
                                <div class="form-wrapper">
                                    <form method="POST" action={{ route('client.profile.updatePassword') }}>
                                        @csrf
                                        <div class="form-container">
                                            <div class="row"> 
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Password<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="password" name="password" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Confirm password<sup aria-hidden="true">*</sup>:</label>
                                                        <input type="password" name="password_confirmation" class="form-control" required />
                                                    </div>
                                                </div> 
                                            </div> 
                                        </div> 
                                        <div class="form-container">   
                                            <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
                                                <button class="btn continue-btn" type="submit">
                                                    Save
                                                </button> 
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="address-tab" class="my-acc-right-content">
                                <div class="section-title">
                                    <h2>Add address</h2>
                                </div>
                                <div class="form-wrapper">
                                    <form> 
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
                                                        <select class="form-control">
                                                            <option>India</option>
                                                            <option>USA</option>
                                                            <option>Canada</option>
                                                            <option>Europe</option>
                                                        </select>
                                                    </div>
                                                </div>  
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Region / State<sup aria-hidden="true">*</sup>:</label>
                                                        <select class="form-control">
                                                            <option>Up</option>
                                                            <option>Gujarat</option>
                                                            <option>Mp</option>
                                                            <option>Hp</option>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Default Address:</label>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="radio-group">
                                                                    <input type="radio" id="yes" name="subscribe" checked/>
                                                                    <label for="yes">Yes</label>
                                                                </div> 
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="radio-group">
                                                                    <input type="radio" id="no" name="subscribe" />
                                                                    <label for="no">No</label>
                                                                </div>
                                                            </div>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div> 
                                        <div class="form-container">   
                                            <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
                                                <button class="btn continue-btn" type="submit">
                                                    Save
                                                </button> 
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="orders-tab" class="my-acc-right-content">
                                <div class="section-title">
                                    <h2>Order History</h2>
                                </div>
                                <div class="order-history-frame">
                                    <table class="order-history-tbl"> 
                                        <thead>
                                            <tr>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">No. of Products</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Total</th> 
                                            <th scope="col">Date Added</th>
                                            <th scope="col"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td data-label="Order ID">
                                                <a href="/product">
                                                    #10
                                                </a>
                                            </td> 
                                            <td data-label="Customer">
                                                John Doe 
                                            </td>
                                            <td data-label="No. of Products">
                                                1
                                            </td>
                                            <td data-label="Status"> 
                                                Pending
                                            </td>
                                            <td data-label="Total"> 
                                                $545.00
                                            </td> 
                                            <td data-label="Date Added">
                                                21 Feb, 2022
                                            </td>
                                            <td data-label="Action">
                                                <a href="{{ route('client.order') }}" class="action">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.50007 14.2498C12.7661 14.2498 15.0886 12.1975 16.4487 10.4883C16.9205 9.89553 16.9205 9.10415 16.4487 8.51133C15.0886 6.80214 12.7661 4.74984 9.50007 4.74984C6.23405 4.74984 3.91153 6.80214 2.5514 8.51133C2.07965 9.10415 2.07965 9.89553 2.5514 10.4883C3.91153 12.1975 6.23405 14.2498 9.50007 14.2498ZM17.6877 11.4743C18.6186 10.3044 18.6186 8.6953 17.6877 7.52542C16.2086 5.66679 13.4794 3.1665 9.50007 3.1665C5.52073 3.1665 2.79153 5.66679 1.31248 7.52542C0.381517 8.6953 0.381517 10.3044 1.31248 11.4743C2.79153 13.3329 5.52073 15.8332 9.50007 15.8332C13.4794 15.8332 16.2086 13.3329 17.6877 11.4743Z" fill="#183A40"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.083 9.50016C11.083 10.3746 10.3741 11.0835 9.49967 11.0835C8.62522 11.0835 7.91634 10.3746 7.91634 9.50016C7.91634 9.47769 7.91681 9.45533 7.91774 9.43308C8.04115 9.47653 8.1739 9.50016 8.31217 9.50016C8.96801 9.50016 9.49967 8.9685 9.49967 8.31266C9.49967 8.17439 9.47604 8.04164 9.4326 7.91822C9.45484 7.9173 9.4772 7.91683 9.49967 7.91683C10.3741 7.91683 11.083 8.62571 11.083 9.50016ZM12.6663 9.50016C12.6663 11.2491 11.2486 12.6668 9.49967 12.6668C7.75077 12.6668 6.33301 11.2491 6.33301 9.50016C6.33301 7.75126 7.75077 6.3335 9.49967 6.3335C11.2486 6.3335 12.6663 7.75126 12.6663 9.50016Z" fill="#183A40"/>
                                                    </svg>
                                                </a>
                                            </td> 
                                            </tr>  
                                            <tr>
                                            <td data-label="Order ID">
                                                <a href="/product">
                                                    #10
                                                </a>
                                            </td> 
                                            <td data-label="Customer">
                                                John Doe 
                                            </td>
                                            <td data-label="No. of Products">
                                                1
                                            </td>
                                            <td data-label="Status"> 
                                                Pending
                                            </td>
                                            <td data-label="Total"> 
                                                $545.00
                                            </td> 
                                            <td data-label="Date Added">
                                                21 Feb, 2022
                                            </td>
                                            <td data-label="Action">
                                                <a href="{{ route('client.order') }}" class="action">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.50007 14.2498C12.7661 14.2498 15.0886 12.1975 16.4487 10.4883C16.9205 9.89553 16.9205 9.10415 16.4487 8.51133C15.0886 6.80214 12.7661 4.74984 9.50007 4.74984C6.23405 4.74984 3.91153 6.80214 2.5514 8.51133C2.07965 9.10415 2.07965 9.89553 2.5514 10.4883C3.91153 12.1975 6.23405 14.2498 9.50007 14.2498ZM17.6877 11.4743C18.6186 10.3044 18.6186 8.6953 17.6877 7.52542C16.2086 5.66679 13.4794 3.1665 9.50007 3.1665C5.52073 3.1665 2.79153 5.66679 1.31248 7.52542C0.381517 8.6953 0.381517 10.3044 1.31248 11.4743C2.79153 13.3329 5.52073 15.8332 9.50007 15.8332C13.4794 15.8332 16.2086 13.3329 17.6877 11.4743Z" fill="#183A40"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.083 9.50016C11.083 10.3746 10.3741 11.0835 9.49967 11.0835C8.62522 11.0835 7.91634 10.3746 7.91634 9.50016C7.91634 9.47769 7.91681 9.45533 7.91774 9.43308C8.04115 9.47653 8.1739 9.50016 8.31217 9.50016C8.96801 9.50016 9.49967 8.9685 9.49967 8.31266C9.49967 8.17439 9.47604 8.04164 9.4326 7.91822C9.45484 7.9173 9.4772 7.91683 9.49967 7.91683C10.3741 7.91683 11.083 8.62571 11.083 9.50016ZM12.6663 9.50016C12.6663 11.2491 11.2486 12.6668 9.49967 12.6668C7.75077 12.6668 6.33301 11.2491 6.33301 9.50016C6.33301 7.75126 7.75077 6.3335 9.49967 6.3335C11.2486 6.3335 12.6663 7.75126 12.6663 9.50016Z" fill="#183A40"/>
                                                    </svg>
                                                </a>
                                            </td> 
                                            </tr>  
                                            <tr>
                                            <td data-label="Order ID">
                                                <a href="/product">
                                                    #10
                                                </a>
                                            </td> 
                                            <td data-label="Customer">
                                                John Doe 
                                            </td>
                                            <td data-label="No. of Products">
                                                1
                                            </td>
                                            <td data-label="Status"> 
                                                Pending
                                            </td>
                                            <td data-label="Total"> 
                                                $545.00
                                            </td> 
                                            <td data-label="Date Added">
                                                21 Feb, 2022
                                            </td>
                                            <td data-label="Action">
                                                <a href="{{ route('client.order') }}" class="action">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.50007 14.2498C12.7661 14.2498 15.0886 12.1975 16.4487 10.4883C16.9205 9.89553 16.9205 9.10415 16.4487 8.51133C15.0886 6.80214 12.7661 4.74984 9.50007 4.74984C6.23405 4.74984 3.91153 6.80214 2.5514 8.51133C2.07965 9.10415 2.07965 9.89553 2.5514 10.4883C3.91153 12.1975 6.23405 14.2498 9.50007 14.2498ZM17.6877 11.4743C18.6186 10.3044 18.6186 8.6953 17.6877 7.52542C16.2086 5.66679 13.4794 3.1665 9.50007 3.1665C5.52073 3.1665 2.79153 5.66679 1.31248 7.52542C0.381517 8.6953 0.381517 10.3044 1.31248 11.4743C2.79153 13.3329 5.52073 15.8332 9.50007 15.8332C13.4794 15.8332 16.2086 13.3329 17.6877 11.4743Z" fill="#183A40"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.083 9.50016C11.083 10.3746 10.3741 11.0835 9.49967 11.0835C8.62522 11.0835 7.91634 10.3746 7.91634 9.50016C7.91634 9.47769 7.91681 9.45533 7.91774 9.43308C8.04115 9.47653 8.1739 9.50016 8.31217 9.50016C8.96801 9.50016 9.49967 8.9685 9.49967 8.31266C9.49967 8.17439 9.47604 8.04164 9.4326 7.91822C9.45484 7.9173 9.4772 7.91683 9.49967 7.91683C10.3741 7.91683 11.083 8.62571 11.083 9.50016ZM12.6663 9.50016C12.6663 11.2491 11.2486 12.6668 9.49967 12.6668C7.75077 12.6668 6.33301 11.2491 6.33301 9.50016C6.33301 7.75126 7.75077 6.3335 9.49967 6.3335C11.2486 6.3335 12.6663 7.75126 12.6663 9.50016Z" fill="#183A40"/>
                                                    </svg>
                                                </a>
                                            </td> 
                                            </tr>  
                                            <tr>
                                            <td data-label="Order ID">
                                                <a href="/product">
                                                    #10
                                                </a>
                                            </td> 
                                            <td data-label="Customer">
                                                John Doe 
                                            </td>
                                            <td data-label="No. of Products">
                                                1
                                            </td>
                                            <td data-label="Status"> 
                                                Pending
                                            </td>
                                            <td data-label="Total"> 
                                                $545.00
                                            </td> 
                                            <td data-label="Date Added">
                                                21 Feb, 2022
                                            </td>
                                            <td data-label="Action">
                                                <a href="{{ route('client.order') }}" class="action">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.50007 14.2498C12.7661 14.2498 15.0886 12.1975 16.4487 10.4883C16.9205 9.89553 16.9205 9.10415 16.4487 8.51133C15.0886 6.80214 12.7661 4.74984 9.50007 4.74984C6.23405 4.74984 3.91153 6.80214 2.5514 8.51133C2.07965 9.10415 2.07965 9.89553 2.5514 10.4883C3.91153 12.1975 6.23405 14.2498 9.50007 14.2498ZM17.6877 11.4743C18.6186 10.3044 18.6186 8.6953 17.6877 7.52542C16.2086 5.66679 13.4794 3.1665 9.50007 3.1665C5.52073 3.1665 2.79153 5.66679 1.31248 7.52542C0.381517 8.6953 0.381517 10.3044 1.31248 11.4743C2.79153 13.3329 5.52073 15.8332 9.50007 15.8332C13.4794 15.8332 16.2086 13.3329 17.6877 11.4743Z" fill="#183A40"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.083 9.50016C11.083 10.3746 10.3741 11.0835 9.49967 11.0835C8.62522 11.0835 7.91634 10.3746 7.91634 9.50016C7.91634 9.47769 7.91681 9.45533 7.91774 9.43308C8.04115 9.47653 8.1739 9.50016 8.31217 9.50016C8.96801 9.50016 9.49967 8.9685 9.49967 8.31266C9.49967 8.17439 9.47604 8.04164 9.4326 7.91822C9.45484 7.9173 9.4772 7.91683 9.49967 7.91683C10.3741 7.91683 11.083 8.62571 11.083 9.50016ZM12.6663 9.50016C12.6663 11.2491 11.2486 12.6668 9.49967 12.6668C7.75077 12.6668 6.33301 11.2491 6.33301 9.50016C6.33301 7.75126 7.75077 6.3335 9.49967 6.3335C11.2486 6.3335 12.6663 7.75126 12.6663 9.50016Z" fill="#183A40"/>
                                                    </svg>
                                                </a>
                                            </td> 
                                            </tr>  
                                            <tr>
                                            <td data-label="Order ID">
                                                <a href="/product">
                                                    #10
                                                </a>
                                            </td> 
                                            <td data-label="Customer">
                                                John Doe 
                                            </td>
                                            <td data-label="No. of Products">
                                                1
                                            </td>
                                            <td data-label="Status"> 
                                                Pending
                                            </td>
                                            <td data-label="Total"> 
                                                $545.00
                                            </td> 
                                            <td data-label="Date Added">
                                                21 Feb, 2022
                                            </td>
                                            <td data-label="Action">
                                                <a href="{{ route('client.order') }}" class="action">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.50007 14.2498C12.7661 14.2498 15.0886 12.1975 16.4487 10.4883C16.9205 9.89553 16.9205 9.10415 16.4487 8.51133C15.0886 6.80214 12.7661 4.74984 9.50007 4.74984C6.23405 4.74984 3.91153 6.80214 2.5514 8.51133C2.07965 9.10415 2.07965 9.89553 2.5514 10.4883C3.91153 12.1975 6.23405 14.2498 9.50007 14.2498ZM17.6877 11.4743C18.6186 10.3044 18.6186 8.6953 17.6877 7.52542C16.2086 5.66679 13.4794 3.1665 9.50007 3.1665C5.52073 3.1665 2.79153 5.66679 1.31248 7.52542C0.381517 8.6953 0.381517 10.3044 1.31248 11.4743C2.79153 13.3329 5.52073 15.8332 9.50007 15.8332C13.4794 15.8332 16.2086 13.3329 17.6877 11.4743Z" fill="#183A40"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.083 9.50016C11.083 10.3746 10.3741 11.0835 9.49967 11.0835C8.62522 11.0835 7.91634 10.3746 7.91634 9.50016C7.91634 9.47769 7.91681 9.45533 7.91774 9.43308C8.04115 9.47653 8.1739 9.50016 8.31217 9.50016C8.96801 9.50016 9.49967 8.9685 9.49967 8.31266C9.49967 8.17439 9.47604 8.04164 9.4326 7.91822C9.45484 7.9173 9.4772 7.91683 9.49967 7.91683C10.3741 7.91683 11.083 8.62571 11.083 9.50016ZM12.6663 9.50016C12.6663 11.2491 11.2486 12.6668 9.49967 12.6668C7.75077 12.6668 6.33301 11.2491 6.33301 9.50016C6.33301 7.75126 7.75077 6.3335 9.49967 6.3335C11.2486 6.3335 12.6663 7.75126 12.6663 9.50016Z" fill="#183A40"/>
                                                    </svg>
                                                </a>
                                            </td> 
                                            </tr>  
                                        </tbody>
                                    </table>
                                    <div class="right-result-tbl text-right">
                                        <b>Showing 1</b> to 1 of 1 (1 Pages)
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