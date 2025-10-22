@extends('layouts.client.site', ['page_title' => 'About Us'])
@section('content')
    <!--wrapper start here-->
    <div class="wrapper">
        <section class="common-banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12"> 
                        <div class="common-banner-content">
                            <div class="section-title">
                                <h2>About <b>us</b></h2>
                            </div>
                            <p>{{ $about_us }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-our-shop-section padding-bottom">
            <div class="container">
                @foreach ($abouts as $key=>$about)
                <div class="row align-items-center @if($key%2===1) row-reverse @endif">
                    <div class="col-md-6 col-12">
                        <div class="abt-shp-column-left">
                            <div class="section-title">
                                <h3>{{ $about->title }}</h3>
                            </div>
                            <p>{{ $about->description }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="abt-shp-column-right">
                            <img src="{{ $about->image_url }}" alt="{{ $about->title }}">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
    <!---wrapper end here-->
@endsection