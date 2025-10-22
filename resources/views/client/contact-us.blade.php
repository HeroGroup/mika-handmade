@extends('layouts.client.site', ['page_title' => 'Contact Us'])
@section('content')
    <!--wrapper start here-->
    <div class="wrapper">
        <section class="common-banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-12"> 
                        <div class="common-banner-content">
                            <div class="section-title">
                                <h2>Contat <b> with us </b></h2>
                            </div>
                            <p>{{ $info }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
        <section class="contact-page padding-top padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-12 contact-left-column">
                        <div class="contact-left-inner row">
                            <ul class="col-sm-6 col-12"> 
                                <li>
                                    <h4>Call us:</h4>
                                    <p><a href="tel:{{ $phone }}">{{ $phone }}</a></p>
                                </li> 
                                <li>
                                    <h4>Email:</h4>
                                    <p><a href="mailto:{{ $email }}">{{ $email }}</a></p>
                                </li> 
                            </ul>
                            <ul class="col-sm-6 col-12"> 
                                <li>
                                    <h4>Address:</h4>
                                    <p class="address">{{ $address }}</p>
                                </li> 
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7 col-12 contact-right-column">
                        <div class="contact-right-inner">
                            <div class="section-title">
                                <h2>Contact <b>form</b></h2>
                            </div>
                            <form class="contact-form" method="POST" action="{{ route('client.sendMessage') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        @if (session('success'))
                                            <div style="color: green;">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if ($errors->any())
                                            <div style="color: red;">
                                                {{ $errors->all()[0] }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Name<sup aria-hidden="true">*</sup>:</label>
                                            <input type="text" name="name" value="{{ auth()->user()?->name ?? old('name') }}" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>E-mail<sup aria-hidden="true">*</sup>:</label>
                                            <input type="email" name="email" value="{{ auth()->user()?->email ?? old('email') }}" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Telephone<sup aria-hidden="true">*</sup>:</label>
                                            <input type="number" name="phone" value="{{ auth()->user()?->phone ?? old('phone') }}" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label> Subject:</label>
                                            <select class="form-control">
                                                @foreach ($subjects as $key=>$value)
                                                <option value="{{ $key }}">{{ $value }}</option>    
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Message:</label>
                                            <textarea class="form-control" name="message" placeholder="How can we help?" rows="8" required>{{ old('message') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-8 col-12"> 
                                        <div class="checkbox-custom">
                                            <input type="checkbox" name="agree" id="ch1" required>
                                            <label for="ch1">
                                                <span>I have read and agree to the <a href="/privacy-policy">Terms & Conditions.</a>  </span>
                                            </label>
                                        </div> 
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <button class="btn submit-btn" type="submit">
                                            Send message 
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
        </section>   
    </div>
    <!---wrapper end here-->
@endsection